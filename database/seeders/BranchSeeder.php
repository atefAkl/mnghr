<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'id' => 1,
                'name' => 'Branch 20330ABG',
                'address' => 'Egypt, Cairo, Helwan, 12 Ahmed Unsi st.,',
                'phone' => '00201020304051',
                'email' => 'company_depart@domain.com',
                'branch_code' => '1501202400002',
                'created_by' => 13,
                'updated_by' => 13,
                'created_at' => '2024-11-27 09:47:01',
                'updated_at' => '2024-11-27 13:53:43'
            ],
            [
                'id' => 2,
                'name' => 'Main Branch',
                'address' => 'Egypt, Alexandria, El Agami, 12 Mousa Edris st.,',
                'phone' => '00201020304050',
                'email' => 'company@domain.com',
                'ismain' => 0,
                'branch_code' => '1501202400001',
                'created_by' => 13,
                'updated_by' => 13,
                'created_at' => '2024-11-27 12:09:03',
                'updated_at' => '2024-11-27 13:55:59'
            ]
        ];

        foreach ($branches as $branchData) {
            Branch::create($branchData);
        }
    }
}
