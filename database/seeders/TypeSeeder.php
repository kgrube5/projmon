<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Create'
        ]);

        Type::create([
            'name' => 'Update'
        ]);

        Type::create([
            'name' => 'Improve'
        ]);

        Type::create([
            'name' => 'Remove'
        ]);

        Type::create([
            'name' => 'Meeting'
        ]);
    }
}
