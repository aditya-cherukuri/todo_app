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

    public function setStatusAttribute($status){
        $this->attributes['status']= $status;
    }

    public function scopeUnfinished($query){
        $query->where('status',"0");
    }

    public function scopeFinished($query){
        $query->where('status',"1");
    }
}
