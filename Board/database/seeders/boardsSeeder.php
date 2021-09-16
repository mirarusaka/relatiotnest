<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class boardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Boards::factory(10)->create();
    }
}
