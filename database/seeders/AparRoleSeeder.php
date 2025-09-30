<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AparRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'reviewing_officer',
                'display_name' => 'Reviewing Officer',
                'permissions' => [
                    'create_forms',
                    'view_part_3',
                    'view_part_4',
                    'edit_part_3',
                    'edit_part_4',
                    'view_part_5',
                    'edit_part_5',
                    'view_part_b'
                ]
            ],
            [
                'name' => 'reporting_officer',
                'display_name' => 'Reporting Officer',
                'permissions' => [
                    'view_part_3',
                    'view_part_4',
                    'edit_part_3',
                    'edit_part_4',
                    'view_part_b',
                    'edit_part_b'
                ]
            ]
        ];

        foreach ($roles as $role) {
            \App\Models\AparRole::create($role);
        }
    }
}
