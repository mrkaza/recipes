<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create();

        factory(App\Recepie::class,100)->create();

        factory(App\Comment::class,300)->create();
    }
}
