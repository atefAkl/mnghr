<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Users Data
        $admins = [
            [
                'id' => 13,
                'name' => 'Yousra Ziad',
                'userName' => 'Yousra_2',
                'email' => 'yousra@ziad.com',
                'password' => '$2y$10$Vt0rWKOQTOAJseYjVVhwweYvjG4dC2J6PsSUAy.vbGs5JNu/ATJBW',
                'remember_token' => 'FmWePmRHtbVekSNjFG6leuHH5h5nx0wa0Fe0gAU6gsOhg7bwerZGnwcYQXn8',
                'status' => 1,
                'updated_by' => 9,
                'created_at' => '2024-10-19 16:59:40',
                'updated_at' => '2024-11-25 16:02:49',
                'profile' => [
                    'first_name' => 'Yousra',
                    'last_name' => 'Ziad',
                    'phone' => '00966548676841',
                    'gender' => 0,
                    'address' => '{"street":"123","city":"Helwan","state":"Cairo","postal_code":"12523","country":"51"}',
                    'image' => 'default.user.profile.png',
                    'dob' => '1979-02-19',
                    'natId' => '2488802741'
                ]
            ],
            [
                'id' => 14,
                'name' => 'Yousra',
                'userName' => 'Yousra',
                'email' => 'yousra@gmail.com',
                'password' => '$2y$12$Q4tJjZNEnI8z8tCKO1ouhek7nJ4N7U9pisO8hP91xStRns2q2UAuy',
                'status' => 1,
                'created_at' => '2024-10-19 16:53:27',
                'updated_at' => '2024-10-19 16:57:33'
            ],
            [
                'id' => 15,
                'name' => 'Hello World',
                'userName' => 'helloWorld',
                'email' => 'hello@worls.glob',
                'password' => '$2y$12$MZzqXxdnPYjfYTaGAg7pXOd813NGpLznqIf/V18HhEznriEk4xlGi',
                'status' => 1,
                'created_at' => '2024-10-24 14:34:54',
                'updated_at' => '2024-10-24 14:34:54'
            ],
            [
                'id' => 16,
                'name' => 'Ali Atef',
                'userName' => 'Ali Atef',
                'email' => 'aliatef@gmail.com',
                'password' => '$2y$12$OOTayqNuuLNLNRuAzKpMTuLAits5g8/Jtt4LmXQNV9XrYMtWVhNnW',
                'status' => 1,
                'updated_by' => 9,
                'created_at' => '2024-10-19 17:02:08',
                'updated_at' => '2024-10-30 14:25:47'
            ],
            [
                'id' => 17,
                'name' => 'Atef Aql',
                'userName' => 'AtefAql',
                'email' => 'atetfakl80@gmail.com',
                'password' => '$2y$10$SdEtIDbJbAzs/zezybroeu83NrQls2W4dnDtnEbQjeDjij2npoVlO',
                'status' => 1,
                'created_at' => '2024-10-20 14:59:59',
                'updated_at' => '2024-10-20 14:59:59'
            ]
        ];

        foreach ($admins as $adminData) {
            $profileData = null;
            if (isset($adminData['profile'])) {
                $profileData = $adminData['profile'];
                unset($adminData['profile']);
            }

            $admin = Admin::create($adminData);

            if ($profileData) {
                $admin->profile()->create($profileData);
            }
        }
    }
}
