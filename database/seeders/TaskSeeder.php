<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            0 => [
                'title' => 'Business selection',
                'description' => 'First we have select a client for business. Then we can proceed further.',
                'due_date' => Carbon::now(),
                'status_id' => 3,
            ],
            1 => [
                'title' => 'Business meeting',
                'description' => 'We will do meeting with our business requirements.',
                'due_date' => Carbon::now(),
                'status_id' => 3,
            ],
            2 => [
                'title' => 'Requirement analysis',
                'description' => 'All requirement should be proper analyzed.',
                'due_date' => Carbon::now(),
                'status_id' => 2,
            ],
            3 => [
                'title' => 'Business requirement documentation (BRD)',
                'description' => 'All requirement should be documented.',
                'due_date' => Carbon::now(),
                'status_id' => 2,
            ],
            4 => [
                'title' => 'Defining',
                'description' => 'Here we define our plan.',
                'due_date' => Carbon::now(),
                'status_id' => 2,
            ],
            5 => [
                'title' => 'Development',
                'description' => 'Finally development step will be start.',
                'due_date' => Carbon::now(),
                'status_id' => 1,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
