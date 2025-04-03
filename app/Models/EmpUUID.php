<?php

namespace App\Models;

use Str;

class EmpUUID 
{
    //
    public static function generate()
    {
        $prefix = 'HR'.date('y'); // بادئة اختيارية
        $randomNumber = mt_rand(0, 9999); // توليد رقم عشوائي بين 1000 و 9999

        return $prefix . '-' . str_pad($randomNumber, 8, '000000', STR_PAD_LEFT);
    }

    public static function isUnique($employeeId)
    {
        // استبدل Employee بالنموذج الخاص بك
        return !Employee::where('employee_id', $employeeId)->exists();
    }

    public static function generateId()
    {
        do {
            $employeeId = self::generate();
        } while (!self::isUnique($employeeId));

        return $employeeId;
    }
}
