<?php

namespace Database\Seeders;

use App\Models\Sorting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SortingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sorting::factory(10)->create();
    }
}
