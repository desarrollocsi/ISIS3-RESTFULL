<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menus_rols extends Model
{
    use HasFactory;
    protected $table="menus_rols";
    protected $fillable = [ 'id_rol', 'id_menu'];
    //****************************************************************
    //******************* Relación de 1 - M  Rol-Menú ****************
    //****************************************************************
    public function menus()
    {
        return $this->belongsTo(menu::class,'id')
                    ->whereestado(true)
                    ->orderBy('id', 'asc');
    }

}
