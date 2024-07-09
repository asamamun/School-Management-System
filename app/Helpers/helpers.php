<?php

use Illuminate\Support\Facades\DB;
use App\Models\Student;

if (!function_exists('get_enum_value')) {
    function get_enum_value($tableName, $columnName, )
    {

        $query = "SHOW COLUMNS FROM $tableName WHERE Field = '$columnName'";
        $result = DB::connection()->getPdo()->query($query)->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                if (preg_match('/^enum\((.*)\)$/', $row['Type'], $matches)) {
                    $enumValues = array_map('trim', explode(',', $matches[1]));
                    return $enumValues;
                }
            }
        }
        return [];
    }
}
if (!function_exists('get_set_value')) {
    function get_set_value($tableName, $columnName, )
    {

        $query = "SHOW COLUMNS FROM $tableName WHERE Field = '$columnName'";
        $result = DB::connection()->getPdo()->query($query)->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                if (preg_match('/^set\((.*)\)$/', $row['Type'], $matches)) {
                    $enumValues = array_map(function($item) {
                        return trim($item, "'");
                    }, explode(',', $matches[1]));
                    return $enumValues;
                }
            }
        }
        return [];
    }
}

if (!function_exists('admissionNoOrEmailExists')) {
    function admissionNoOrEmailExists($value)
    {
        return Student::where('admission_no', $value)
                      ->orWhere('email', $value)
                      ->exists();
    }
}


class StudentHelper
{
    public static function generateNewAdmissionNo()
    {
        $maxAdmissionNo = Student::max('admission_no');
        $newAdmissionNo = $maxAdmissionNo + 1;
        return str_pad($newAdmissionNo, 6, '0', STR_PAD_LEFT);
    }

    public static function generateNewRollNo()
    {
        $maxRollNo = Student::max('roll_no');
        $newRollNo = $maxRollNo + 1;
        return str_pad($newRollNo, 5, '0', STR_PAD_LEFT);
    }
}
