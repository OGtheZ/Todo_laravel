<?php

namespace Database\Seeders;

use App\Models\Task;
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
         User::factory(10)->create([
             'password' => bcrypt('todoapp')
         ])->each(function ($user) {
             Task::factory(30)->create([
                 'user_id' => $user->id
             ]);
             Task::factory(30)->create([
                 'user_id' => $user->id,
                 'deleted_at' => now()
             ]);
         });
    }
}
