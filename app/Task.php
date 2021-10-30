<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function taskType() {
        return $this->belongsTo(Type::class,'type_id', 'id');
    }

    public function ownerType() {
        return $this->belongsTo(Owner::class,'owner_id', 'id');
    }
}
