<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserCompanySeeder extends Seeder
{
    /**
     * Run the database seeds for items table.
     */
    public function run()
    {
        $companiesPerUser = 5;

        $users     = User::all();
        $companies = Company::get('id')->pluck('id')->chunk($companiesPerUser)->all();

        $offset = 0;

        foreach ($users as $user) {
            $user->companies()->attach($companies[$offset]->toArray());
            ++$offset;
        }
    }
}
