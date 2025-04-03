<?php

namespace Database\Seeders;

use App\Models\DepartmentLevel;
use Illuminate\Database\Seeder;

class DepartmentLevelSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            [
                'key' => 'executive',
                'name' => ['en' => 'Executive', 'ar' => 'تنفيذي'],
                'description' => ['en' => 'C-Level executives (CEO, CFO, etc.)', 'ar' => 'المستوى التنفيذي (المدير التنفيذي، المدير المالي، إلخ)'],
                'order' => 1,
                'hierarchy_group' => 'executive'
            ],
            [
                'key' => 'vp',
                'name' => ['en' => 'Vice President', 'ar' => 'نائب الرئيس'],
                'description' => ['en' => 'VP level departments', 'ar' => 'إدارات مستوى نائب الرئيس'],
                'order' => 2,
                'hierarchy_group' => 'executive'
            ],
            [
                'key' => 'director',
                'name' => ['en' => 'Director', 'ar' => 'مدير عام'],
                'description' => ['en' => 'Department directors', 'ar' => 'المدراء العامون للإدارات'],
                'order' => 3,
                'hierarchy_group' => 'management'
            ],
            // يمكن إضافة باقي المستويات بنفس الطريقة
        ];
        
        foreach ($levels as $level) {
            DepartmentLevel::create($level);
        }
    }
}