<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            0 => [
                'name' => 'To Do',
                'status' => 1
            ],
            1 => [
                'name' => 'In Progress',
                'status' => 1
            ],
            2 => [
                'name' => 'Completed',
                'status' => 1
            ]
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
