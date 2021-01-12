<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActoMedicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            // 'motivo'        => 'required|min:1|max:30',
            'idcita'            => 'required|integer',
            'motivo'            => 'required|string',
            'problema'          => 'required|string',
            'parterial'         => 'required|numeric',
            'fcardiaca'         => 'required|numeric',
            'tbucal'            => 'required|numeric',
            'taxiliar'          => 'required|numeric',
            'peso'              => 'required|numeric',
            'talla'             => 'required|numeric',
            'icorporal'         => 'required|numeric',
            'pcefalico'         => 'required|numeric',
            // 'pcefalico'         => 'required|numeric|digits_between:10,2',
            'destino'           => 'required|integer',
            'examen'            => 'required|string',
            'antecedentes'      => 'array|min:1',
            // 'antecedentes'        => 'required|in:id,descripcion,valor',
            'antecedentes.*.id' => 'required|integer',
            'antecedentes.*.valor' => 'required|string',

            'diagnosticos'      => 'array|min:1',
            'diagnosticos.*.idcie' => 'required|integer',
            'diagnosticos.*.tdx' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'idcita.required'       => 'El campo "idcita" debe ser un campo requerido.',
            'motivo.required'       => 'El campo "motivo" debe ser un campo requerido.',
            'problema.required'     => 'El campo "problema" debe ser un campo requerido.',
            'parterial.required'    => 'El campo "parterial" debe ser un campo requerido.',
            'fcardiaca.required'    => 'El campo "fcardiaca" debe ser un campo requerido.',
            'taxiliar.required'     => 'El campo "taxiliar" debe ser un campo requerido.',
            'peso.required'         => 'El campo "peso" debe ser un campo requerido.',
            'talla.required'        => 'El campo "talla" debe ser un campo requerido.',
            'icorporal.required'    => 'El campo "icorporal" debe ser un campo requerido.',
            'pcefalico.required'    => 'El campo "pcefalico" debe ser un campo requerido.',
            'destino.required'      => 'El campo "destino" debe ser un campo requerido.',
            'examen.required'       => 'El campo "examen" debe ser un campo requerido.',
            'antecedentes.*.id.required'            => 'El campo "Antecedentes.id" debe ser un campo requerido.',
            'antecedentes.*.valor.required'         => 'El campo "Antecedentes.valor" debe ser un campo requerido.',

            // 'nombre.min'            => 'El :attribute debe contener mas de una letra.',
            // 'nombre.max'            => 'El :attribute debe contener max 30 letras.',    
            // 'ap_paterno.required'   => 'El :attribute es obligatorio.',
            // 'ap_paterno.min'        => 'El :attribute debe contener mas de una letra.',
            // 'ap_paterno.max'        => 'El :attribute debe contener max 30 letras.',    
            // 'ap_materno.required'   => 'El :attribute es obligatorio.',
            // 'ap_materno.min'        => 'El :attribute debe contener mas de una letra.',
            // 'ap_materno.max'        => 'El :attribute debe contener max 30 letras.',
    
            // 'alias.required'   => 'El :attribute es obligatorio.',
            // 'alias.min'        => 'El :attribute debe contener mas de una caracter.',
            // 'alias.max'        => 'El :attribute debe contener max 30 letras.',
    
            // 'email.required'    => 'El :attribute es obligatorio.',
            // 'email.email'       => 'El :attribute debe ser un correo válido.',
    
            // 'nivel_acceso.required'   => 'Debe seleccionar un :attribute .',
            // 'sexo.required'           => 'Debes seleccionar tu :attribute .',
    
            // 'edad.required'     => 'El :attribute es obligatorio.',
            // 'edad.integer'      => 'El :attribute debe ser entero.',
        ];
    }
    
}
