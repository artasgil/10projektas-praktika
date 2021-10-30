<?php

use Illuminate\Database\Seeder;
use App\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Owner::class,50)->create();

    }
}
