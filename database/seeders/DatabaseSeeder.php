<?php

namespace Database\Seeders;

use App\Models\Foods;
use App\Models\Tag;
use App\Models\User;
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
       Foods::factory(10)->has(Tag::factory()->count(3))->create();
       // Tag::factory(10)->create();
       // Foods::factory(10)->create();
        User::factory(10)->create();

    }
}
