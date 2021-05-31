<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanyAndEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(20)
            ->create()
            ->each(function($company) {
                Employee::factory(random_int(5, 20))
                    ->create([
                        'company_id' => $company->id,
                    ]);
            });
    }
}
