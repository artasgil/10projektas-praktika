<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ["title" => "atlikta", "description"=> 'atlikta aprasymas'],
            ["title" => "neatlikta", "description"=> 'neatlikta aprasymas'],
            ["title" => "vykdoma", "description"=> 'vykdoma aprasymas'],
            ["title" => "nebeaktuali", "description"=> 'nebeaktuali aprasymas'],
        ]);


    }
}
