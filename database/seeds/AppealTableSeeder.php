<?php

use Illuminate\Database\Seeder;

class AppealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Appeal::class, 1000)->create();
    }
}
