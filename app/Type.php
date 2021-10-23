<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function typeAll() {
        return $this->hasMany(Task::class,'type_id', 'id');
    }

}
