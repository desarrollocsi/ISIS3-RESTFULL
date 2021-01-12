<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;
    protected $table = 'historias';
    protected $primaryKey = 'hc_numhis';
    protected $keyType = 'string';
    protected $hidden = ['hc_numdoc'];
}
