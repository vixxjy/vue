<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'name' => 'Super Admin',
        	'email' => 'superadmin@finance.com',
        	'password' => bcrypt('secret')
        ]);
        $user->save();
        // $user->assignRole("SuperAdmin");
        

        $user = new \App\User([
            'name' => 'Admin',
        	'email' => 'admin@finance.com',
        	'password' => bcrypt('secret')
        ]);
        $user->save();
        // $user->assignRole("Admin");

        // seeding Arrears Category
        // $arrear = new \App\ArrearsCategory([
        //     'name' => 'Contractor\'s Arrears',
        //     'slug' => 'Contractor\'s-Arrears'
        // ]);
        // $arrear->save();

        // $arrear = new \App\ArrearsCategory([
        //     'name' => 'Pension And Gratuity Arrears',
        //     'slug' => 'Pension-And-Gratuity-Arrears'
        // ]);
        // $arrear->save();
        // $arrear = new \App\ArrearsCategory([
        //     'name' => 'Salary Arrears And Other Staff Claims Arrears',
        //     'slug' => 'Salary-Arrears-And-Other-Staff-Claims-Arrears'
        // ]);
        // $arrear->save();
        // $arrear = new \App\ArrearsCategory([
        //     // 'name' => 'Other Arrears - Type X',
        //     'name' => 'Judgement Debt',
        //     'slug' => 'Other-Arrears-Type-X'
        // ]);
        // $arrear->save();
        // $arrear = new \App\ArrearsCategory([
        //     'name' => 'Other Arrears - Type Y',
        //     'slug' => 'Other-Arrears-Type-Y'
        // ]);
        // $arrear->save();
        
    }
}
