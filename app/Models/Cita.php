<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\CitaRequest;
use Illuminate\Support\Collection;

// use App\Http\Resources\DatoPaciente as DatoPacienteResource;
use App\Http\Resources\Citados as CitadosResource;
use Carbon\Carbon;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'ci_idcita';
    protected $keyType = "integer";
    protected $appends = ['nombre_completo'];
    //-----------------------------------------------------------------------------/
    //--------------------------------- *- RELACIONES *-  --------------------------/
    //-----------------------------------------------------------------------------/
    public function historia()
    {
        return $this->hasMany(Historia::class, 'hc_numhis', 'ci_numhist');
    }

    public function especialidad()
    {
        return $this->hasOne(Especialidad::class, 'es_codigo', 'ci_servicio');
    }

    public function medico()
    {
        return $this->hasOne(Medico::class, 'me_codigo', 'ci_medico');
    }
    //------------------------------------------------------------------------/
    //--------------------------------- *- END *-  --------------------------/
    //-----------------------------------------------------------------------/


       //-----------------------------------------------------------------------------/
       //--------------------------------- *- FUNCIONES *-  ----------------------------/
       //-----------------------------------------------------------------------------/

       //*****************************************************************************/
       //********** pacientesCitados(): Obtiene el listado de Pacientes Citas. *******/
       //*****************************************************************************/
       public function pacientesCitados(CitaRequest $request)
       {
            // return response()->json(['message' => 'Prueba de respuesta']);
           $data = Cita::whereCi_fechacitaAndCi_medico($request->fecha, $request->medico)
               ->whereIn('ci_estado',['R','A'])
               ->with(['historia' => function ($q) {
                   $q->select('hc_numhis', 'hc_apepat', 'hc_apemat', 'hc_nombre', 'hc_fecnac');
               }])->with(['medico' => function ($q) {
                   $q->select('me_codigo', 'me_nombres');
               }])->with(['especialidad' => function ($q) {
                   $q->select('es_codigo', 'es_descripcion');
               }])
               ->orderBy('ci_horatencion')
               ->get(['ci_idcita', 'ci_orden', 'ci_numhist', 'ci_horatencion', 'ci_paciente', 'ci_medico', 'ci_servicio','ci_estado']);
           return CitadosResource::collection($data);
           //return $data;
       }
       //*******************************************************************************************/
        //********** getNombreCompletoAttribute(): Obtiene el Nombre completo del Paciente. *******/
        //*******************************************************************************************/
       public function getNombreCompletoAttribute()
       {
           return $this->ci_numhist === '0000000000' ?
               $this->ci_paciente :
               $this->historia[0]->hc_apepat . ' ' .
               $this->historia[0]->hc_apemat . ' ' .
               $this->historia[0]->hc_nombre;
       }
       //*******************************************************************************************/
       //********** getCalculaEdadAttribute(): Obtiene la Edad(años, meses, días) del Paciente. ****/
       //*******************************************************************************************/
       public function getCalculaEdadAttribute()
       {        
           $fecnac =    $this->ci_numhist === '0000000000' ?
                        $this->ci_paciente :
                        $this->historia[0]->hc_fecnac;
            $time = strtotime(str_replace('/', '-', $fecnac));
            $mes = date("m", $time);
            $dia = date("d", $time);
            $edad = Carbon::parse(date('Y-m-d',$time))->age;
            
            return  $edad.' a/'.$mes.' m/'.$dia.' d';
       }
       //*******************************************************************************************/
       //********** datoPacienteDato(): Obtiene los Datos del Paciente. ****************************/
       //*******************************************************************************************/
       public function datoPacienteDato(Cita $cita)
       {
   
           $data = Cita::whereCi_idcita($cita->ci_idcita)
               ->with(['historia' => function ($q) {
                   $q->select('hc_numhis', 'hc_apepat', 'hc_apemat', 'hc_nombre', 'hc_fecnac', 'hc_sexo');
               }])
               ->with(['medico' => function ($q) {
                   $q->select('me_codigo', 'me_nombres');
               }])
               ->with(['especialidad' => function ($q) {
                   $q->select('es_codigo', 'es_descripcion');
               }])
               ->get([
                   'ci_idcita', 'ci_numhist', 'ci_fechacita', 'ci_edad',
                   'ci_horatencion', 'ci_paciente', 'ci_medico', 'ci_servicio'
               ]);
   
           return DatoPacienteResource::collection($data);
       }
   
}
