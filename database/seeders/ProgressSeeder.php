<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Progress;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::create([
            'name' => 'Not Started'
        ]);

        Progress::create([
            'name' => 'In Progress'
        ]);

        Progress::create([
            'name' => 'In Review'
        ]);

        Progress::create([
            'name' => 'Completed'
        ]);

        Progress::create([
            'name' => 'Accepted'
        ]);

        Progress::create([
            'name' => 'Denied'
        ]);

        Progress::create([
            'name' => 'Needs Improvement'
        ]);
    }
}
