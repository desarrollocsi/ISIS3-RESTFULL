<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $table="menus";
    protected $casts = [
        'id'        => 'integer',
        'nivel'     => 'integer',
        'nombre'      => 'string',
        'icono'      => 'string',
        'padre'     => 'integer',
        //'accion'     => 'string',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'iduser',
        'pivot',
    ];

    protected $fillable = [ 'id', 'nivel', 'nombre', 'padre', 'accion','icono','estado','iduser' ];

    public function parent(){
        return $this->hasOne('App\Models\menu', 'id','padre');
    }
    public function children(){
        return $this->hasMany('App\Models\menu', 'padre','id');
    }
    public static function tree() {
        return static::with(implode('.', array_fill(0, 4, 'children')))
                ->where('padre', '=', 0)->get();
    }
    public function roles(){
        return $this->belongsToMany('App\Models\rol','menus_rols','id_rol','id_menu')
                    ->whereestado(true);
    }


}
