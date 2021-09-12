<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'user_id', 'task_title', 'category', 'task_details', 'color', 'status', 'task_deadline'
    ];
}
