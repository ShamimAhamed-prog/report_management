<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function isActive(){
        return $is_active = [
            ''=>'Select',
            '1'=>'Active',
            '0'=>'Deactive',
        ];
    }
    public static function QuestionType()
    {
        return $qtype = [
            '' => 'Select Type',
            '1' => 'Radio',
            '2' => 'Checkbox',
            '3' => 'Text',
        ];
    }
    public static function QuestionSubmitType()
    {
        return $qstype = [
            '' => 'Select Submit Type',
            '1' => 'Daily',
            '2' => 'Weekly',
            '3' => 'Monthly',
        ];
    }
    public static function QuestionGroup()
    {
        return $type = [
            '' => 'Select Type',
            '1' => 'Hr',
            '2' => 'Management',
        ];
    }
}
