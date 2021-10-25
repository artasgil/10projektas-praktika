<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Task;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tasks')->insert([
        //     ["title" => "title1", "description"=> 'description1', "logo" => 'logo1', "type_id" => 1],
        //     ["title" => "title2", "description"=> 'description2', "logo" => 'logo2', "type_id" => 2],
        //     ["title" => "title3", "description"=> 'description3', "logo" => 'logo3', "type_id" => 3],
        //     ["title" => "title4", "description"=> 'description4', "logo" => 'logo4', "type_id" => 4],
        //     ["title" => "title5", "description"=> 'description5', "logo" => 'logo5', "type_id" => 1],
        //     ["title" => "title6", "description"=> 'description6', "logo" => 'logo6', "type_id" => 2],
        //     ["title" => "title7", "description"=> 'description7', "logo" => 'logo7', "type_id" => 3],
        //     ["title" => "title8", "description"=> 'description8', "logo" => 'logo8', "type_id" => 4],
        //     ["title" => "title9", "description"=> 'description9', "logo" => 'logo9', "type_id" => 1],
        //     ["title" => "title10", "description"=> 'description10', "logo" => 'logo10', "type_id" => 2],
        // ]);

        factory(Task::class,150)->create();
    }
}
