<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class rol extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table="rols";

    protected $hidden = [
        'created_at',
        'updated_at',
        'iduser',
        'pivot',
    ];
    protected $fillable = [
        'nombre',
        'superadmin',
        'estado',
        'iduser',
    ];
    //****************************************************************
    //******  Propiedades para el registro del Log. JLT:20203010  ******
    //****************************************************************
    protected static $logAttributes =['nombre','superadmin'];
    protected static $ignoreChangedArttributes =['estado','updated_at'];
    protected static $recordEvents =['created','updated','deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'Rol';
    public function getDescriptionForEvent(string $eventName):string
    {
        return "Evento : {$eventName}";
    }
    //****************************************************************
    //******************* Relación de N - M  Rol-Menú ****************
    //****************************************************************
    public function menus()
    {
        return $this->belongsToMany(menu::class,'menus_rols','id_rol','id_menu')
                    ->whereestado(true)
                    ->orderBy('id', 'asc');
    }
}
