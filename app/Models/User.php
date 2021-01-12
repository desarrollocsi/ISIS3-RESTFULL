<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Notifiable, HasApiTokens; /* ADD : JLT :2020/10/13 Modelos Token.*/
    use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //**  Propiedades para el Log. JLT:20203010
    protected static $logAttributes =['name','email'];
    protected static $ignoreChangedArttributes =['password','updated_at'];
    protected static $recordEvents =['created','updated'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName):string
    {
        return "Nombre del Evento : {$eventName}";
    }
    //****************************************************************
    //******************* Relación de N - 1  User - Rol ****************
    //****************************************************************
    public function rol()
    {
      return $this->belongsTo('App\Models\rol', 'id_rol')->whereestado(true)->with('menus');
    }
    public function ValidaRolAdmin($id_rol){
      $Rol = Rol::find($id_rol);
      return $Rol['superadmin'];
    }
    public function MenuAdmin($id_rol){
      return  Menu::tree();
    }    
    public function MenuUser($id_rol){
      $Menu = Rol::with('menus')->find($id_rol)['menus'];
      return $this->formatTree($Menu, 0);
    }
    // ------------------------------------------
    // ---------  Agrupar tree y nodos ----------
    // ------------------------------------------
    public function formatTree($tree, $parent)
    {
        $tree2 = array();
        foreach ($tree as $item) {
            if ($item['padre'] == $parent) {
                $tree2[$item['id']] = $item;
                if ($this->formatTree($tree, $item['id'])){
                    $tree2[$item['id']]['children'] = $this->formatTree($tree, $item['id']);
                }
            }
        }
        return $tree2;
    }

}
