<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Reviewing Officer
        $reviewingOfficer = \App\Models\User::create([
            'name' => 'Reviewing Officer',
            'email' => 'reviewing.officer@tropmet.res.in',
            'password' => bcrypt('Admin@123'),
        ]);

        // Create Reporting Officer
        $reportingOfficer = \App\Models\User::create([
            'name' => 'Reporting Officer',
            'email' => 'reporting.officer@tropmet.res.in',
            'password' => bcrypt('Iitm@123'),
        ]);

        // Assign roles
        $reviewingRole = \App\Models\AparRole::where('name', 'reviewing_officer')->first();
        $reportingRole = \App\Models\AparRole::where('name', 'reporting_officer')->first();

        $reviewingOfficer->aparRoles()->attach($reviewingRole->id);
        $reportingOfficer->aparRoles()->attach($reportingRole->id);
    }
}
