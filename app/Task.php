<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'task_name',
        'status'
    ];

    public function setStatus($status){
        $this->attributes['status']=($status);
    }
}
