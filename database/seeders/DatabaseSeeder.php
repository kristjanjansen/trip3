<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Content;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$users = User::factory(2)->create();
        Content::factory(10)->create();
        Content::factory(10)
            ->hasComments(3)
            ->create();
    }
}
