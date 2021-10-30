<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title", 225);
            $table->longText("description");
            $table->string("logo", 225);
            $table->date("start_date");
            $table->date("end_date");
            $table->unsignedBigInteger("type_id");
            $table->unsignedBigInteger("owner_id");
            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("owner_id")->references("id")->on("owners");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
