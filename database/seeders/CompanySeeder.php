<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds for items table.
     */
    public function run()
    {
        Company::factory()->count(50)->create();
    }
}
