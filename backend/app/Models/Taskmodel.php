<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskmodel extends Model
{
   protected $fillable = ['user_id', 'state', 'description', 'deadline'];

    protected $table = 'tasks';
}
