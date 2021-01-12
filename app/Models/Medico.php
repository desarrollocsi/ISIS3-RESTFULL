<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // use HasFactory;
    protected $table = 'medicos';
    protected $primaryKey = 'me_colegio';
    protected $keyType = 'string';
    protected $fillable = ['me_docid', 'me_nrodocumento'];
    public $timestamps = false;
}
