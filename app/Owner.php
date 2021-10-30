<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function ownerAll() {
        return $this->hasMany(Task::class,'owner_id', 'id');
    }
}
