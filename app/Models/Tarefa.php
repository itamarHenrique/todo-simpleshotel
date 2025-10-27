<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    Use SoftDeletes;

    protected $fillable = ['titulo','descricao','status'];
}
