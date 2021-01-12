<?php

namespace App\Http\Controllers;

use App\Models\ActoMedico;
use Illuminate\Http\Request;
use App\Models\antecedentes_acto_medico as ActoMedicoAnt;
use App\Http\Requests\ActoMedicoRequest;
use App\Models\Diagnostico_Acto_Medico as DiagActMed;

class ActoMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $actoMedico, $actoMedicoAnt,$Diagnostico;
    public function __construct(ActoMedico $actoMedico, ActoMedicoAnt $actoMedicoAnt,DiagActMed $Diagnostico)
    {
        $this->actoMedico = $actoMedico;
        $this->actoMedicoAnt = $actoMedicoAnt;
        $this->Diagnostico = $Diagnostico;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActoMedicoRequest $request)
    {
        // return $request->antecedentes['0'];
        $requestAnt = array();
        $requestDiag = array();
        // $requestAnt = new Request();
        $this->actoMedico->registrarActoMedico($request);
        foreach ($request->antecedentes as $requestAnt) {           
            $requestAnt['idcita'] = $request->idcita;           
            $this->actoMedicoAnt->registroAntecedente($requestAnt);
        }
        foreach ($request->diagnosticos as $requestDiag) {           
            $requestDiag['idcita'] = $request->idcita;           
            $this->Diagnostico->registroDiagnosticoMedico($requestDiag);
        }

        
        return response()->json([
            'status' => true,
            'message' => 'Se Registro correctamente!!!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActoMedico  $actoMedico
     * @return \Illuminate\Http\Response
     */
    public function show(ActoMedico $actoMedico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActoMedico  $actoMedico
     * @return \Illuminate\Http\Response
     */
    public function edit(ActoMedico $actoMedico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActoMedico  $actoMedico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActoMedico $actoMedico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActoMedico  $actoMedico
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActoMedico $actoMedico)
    {
        //
    }
}
