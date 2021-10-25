<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Type extends Model
{
    public function typeAll() {
        return $this->hasMany(Task::class,'type_id', 'id');
    }

    use Sortable;

    protected $table="types";

    protected $fillable = ["title", "description"];

    public $sortable = ["id", "title", "description"];

}
