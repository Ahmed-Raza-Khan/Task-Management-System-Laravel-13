<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach (range(1, 20) as $i) {
            Task::create([
                'user_id' => $users->random()->id,
                'title' => fake()->sentence,
                'description' => fake()->paragraph,
                'status' => fake()->randomElement(['pending','in_progress','completed']),
                'priority' => fake()->randomElement(['low','medium','high']),
                'category' => fake()->word,
                'due_date' => fake()->dateTimeBetween('now', '+1 month'),
            ]);
        }
    }
}
