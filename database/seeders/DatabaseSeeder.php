<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            ['name' => 'Finance'],
            ['name' => 'HR'],
            ['name' => 'Admin'],
        ]);

        \App\Models\User::factory()->create([
            'user_name' => 'ahsan test',
            'email' => 'ahsan@test.com',
            'password' => 'password',
            'role_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'user_name' => 'Test',
            'email' => 'test@example.com',
        ]);


        \App\Models\User::factory(10)->create();

        DB::table('departments')->insert([
            ['name' => 'Sale'],
            ['name' => 'Marketing'],
            ['name' => 'IT'],
        ]);

        DB::table('offices')->insert([
            ['name' => 'Peshaware office', 'address' => ' in peshaware','city' => 'peshawar','status' => true ],
            ['name' => 'Islamabad office', 'address' => ' in islamabad','city' => 'islamabad','status' => true],
            ['name' => 'Kohat office', 'address' => ' in Kohat','city' => 'Kohat','status' => true],
            ['name' => 'Lahore office', 'address' => ' in Lahore','city' => 'Lahore','status' => true],
        ]);

        DB::table('employee_designations')->insert([
            ['name' => 'Investment Advisor', 'commission'=>2.5 , 'target'=>3_000_000],
            ['name' => 'Team Lead', 'commission'=>2.5 , 'target'=>4_000_000],
            ['name' => 'Branch Manager', 'commission'=>2.5 , 'target'=>4_000_000],
            ['name' => 'Bussiness Center Manager', 'commission'=>2.5, 'target'=>6_000_000],
            ['name' => 'Zonal Manager', 'commission'=>2.5 , 'target'=>10_000_000],
        ]);

        \App\Models\Employee::factory(20)->create();

        DB::table('customers')->insert([
            ['first_name' => 'test','last_name'=>'customer','cnic'=>'1234567891011','address'=>'from islamabad','employee_id'=>1,'status'=>true]
        ]);

        DB::table('zms')->insert([
            ['employee_id'=>1],
        ]);

        DB::table('bcms')->insert([
            ['employee_id'=>3,'zm_id'=>1,],
            ['employee_id'=>2,'zm_id'=>1,],
        ]);

        DB::table('teams')->insert([
            ['name'=>'Hawk','office_id'=>1,'bcm_id'=>1,],
            ['name'=>'Falcon','office_id'=>2,'bcm_id'=>1,],
            ['name'=>'Gladiator','office_id'=>3,'bcm_id'=>1,],
            ['name'=>'Qalandar','office_id'=>2,'bcm_id'=>2,],
            ['name'=>'united','office_id'=>3,'bcm_id'=>2,],
        ]);

        $this->updateEmployeesWithRandomTeamId();
    }

    private function updateEmployeesWithRandomTeamId(): void
    {
        $employees = \App\Models\Employee::all();

        foreach ($employees as $employee) {
            $randomNumber = random_int(1, 10); 

            if ($randomNumber <= 5) {
                $randomTeamId = random_int(1, 5);
                $employee->update(['team_id' => $randomTeamId]);
            } else {
                $employee->update(['team_id' => null]);
            }
        }
    }
}
