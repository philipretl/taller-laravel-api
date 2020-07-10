<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstitucionModel;
use App\Services\Contracts\InstitucionService;
use Venoudev\Results\Contracts\Result;
use App\Http\Resources\InstitucionResource;
use Venoudev\Results\ApiJsonResources\PaginatedResource;

class InstitucionController extends Controller
{
    protected $institucionService;
    protected $result;

    public function __construct(InstitucionService $service, Result $result){
       $this->institucionService = $service;
       $this->result = $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = $this->institucionService->listarInstitucion();
        $data = InstitucionResource::collection($instituciones);
        $this->result->success();
        $this->result->setDescription('Listado de instituciones del cauca');
        $this->result->addMessage('LIST_DATA','Lista de modelos');
        //$this->result->addDatum('instituciones',$data);
        $this->result->addDatum('instituciones-paginadas',PaginatedResource::make($data->paginate(15), 'instituciones'));

        return $this->result->getJsonResponse();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institucion = $this->institucionService->registrarInstitucion($request);

        $this->result->success();
        $this->result->setDescription('Institucion registrada correctamente');
        $this->result->addMessage('REGISTERED','institucion registrada');
        $this->result->addDatum('institucion', InstitucionResource::make($institucion));

        return $this->result->getJsonResponse();

        // Instanciar un result con ResultManager sin inyeccion de dependencias =>
        // $result_dos = ResultManager::createResult();
        // $result_dos->success();
        // $result_dos->setDescription('Institucion registrada correctamente');
        // $result_dos->addMessage('REGISTERED','institucion registrada');
        // $result_dos->addDatum('institucion', InstitucionResource::make($institucion));
        //
        // return $result_dos->getJsonResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $institucion = $this->institucionService->actualizarInstitucion($request);

        $this->result->success();
        $this->result->setDescription('Institucion actualizada correctamente');
        $this->result->addMessage('UPDATED','Model actualizada');
        $this->result->addDatum('institucion', InstitucionResource::make($institucion));

        return $this->result->getJsonResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
