<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskmodel extends Model
{
    protected $fillable=[
        'description',
        'user_id',
        'state'
    ];
    protected $table = 'tasks';
}
