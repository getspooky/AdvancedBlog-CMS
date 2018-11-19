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
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class,100)->create();

        factory(\App\Post::class,100)->create();

        factory(\App\Article::class,100)->create();

    }
}
