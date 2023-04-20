<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
       $adminRole = Role::create([
            'name' => 'admin'
       ]);
       $admin->assignRole($adminRole);  
      
      // data entry operator seeder
      
    $dataEntryOperator = User::create([
        'name' => 'data_entry_operator', 
        'email' => 'dataentryoperator@gmail.com',
        'password' => Hash::make('password'),
    ]);
    $dataEntryOperatorRole = Role::create([
        'name' => 'data_entry_operator'
   ]);
   $dataEntryOperator->assignRole($dataEntryOperatorRole);  

    // call agent seeder
    $callAgent = User::create([
        'name' => 'call_agent', 
        'email' => 'callagent@gmail.com',
        'password' => Hash::make('password'),
    ]);
    $callAgentRole = Role::create([
        'name' => 'call_agent'
   ]);
   $callAgent->assignRole($callAgentRole);  

    // nurse seeder
    $nurse = User::create([
        'name' => 'nurse', 
        'email' => 'nurse@gmail.com',
        'password' => Hash::make('password'),
    ]);
    $nurseRole = Role::create([
        'name' => 'nurse'
   ]);
   $nurse->assignRole($nurseRole);  
   
   //front office agent seeder
   $frontOfficeAgent = User::create([
    'name' => 'front_office_agent', 
    'email' => 'frontofficeagent@gmail.com',
    'password' => Hash::make('password'),
   ]);
$frontOfficeAgentRole = Role::create([
    'name' => 'front_office_agent'
]);
$frontOfficeAgent->assignRole($frontOfficeAgentRole);

 //provider seeder
   $provider = User::create([
    'name' => 'provider', 
    'email' => 'provider@gmail.com',
    'password' => Hash::make('password'),
   ]);
 $providerRole = Role::create([
    'name' => 'provider'
]);
$provider->assignRole($providerRole);

//biller seeder
$biller = User::create([
    'name' => 'biller', 
    'email' => 'biller@gmail.com',
    'password' => Hash::make('password'),
   ]);
 $billerRole = Role::create([
    'name' => 'biller'
]);
$biller->assignRole($billerRole);
    
    // super admin discharge health seeder
$superAdminDischargeHeath = User::create([
    'name' => 'super_admin_discharge_health', 
    'email' => 'superadmindischargehealth@gmail.com',
    'password' => Hash::make('password'),
   ]);
   $superAdminDischargeHeathRole = Role::create([
    'name' => 'super_admin_discharge_health'
]);
$superAdminDischargeHeath->assignRole( $superAdminDischargeHeathRole);
    
 // super admin provider office seeder
 $superAdminProviderOffice = User::create([
    'name' => 'super_admin_provider_office', 
    'email' => 'superadminprovideroffice@gmail.com',
    'password' => Hash::make('password'),
   ]);
   $superAdminProviderOfficeRole = Role::create([
    'name' => 'super_admin_provider_office'
]);
$superAdminProviderOffice->assignRole($superAdminProviderOfficeRole);
}
}