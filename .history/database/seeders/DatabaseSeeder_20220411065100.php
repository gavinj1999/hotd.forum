<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
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
        User::factory(19)->create();

                User::factory()->create([
            'name' => 'Andre',
            'email' => 'andre_madarang@hotmail.com',
        ]);

        Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);
        Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-black']);
        Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green text-white']);
        Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-red text-white']);

        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        




    }
}
