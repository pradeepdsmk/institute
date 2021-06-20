<?php

namespace App\Libraries\Forms;

include __DIR__ . '/FormControl.php';
include __DIR__ . '/FormSimpleTextControl.php';
include __DIR__ . '/FormDateControl.php';
include __DIR__ . '/FormEmailControl.php';
include __DIR__ . '/FormFileUploadControl.php';
include __DIR__ . '/FormImageUploadControl.php';
include __DIR__ . '/FormNumberControl.php';
include __DIR__ . '/FormPasswordControl.php';
include __DIR__ . '/FormHiddenControl.php';
include __DIR__ . '/FormRadioButtonControl.php';
include __DIR__ . '/FormRadioGroupControl.php';

class F
{
    public static function text($label)
    {
        return new FormSimpleTextControl($label);
    }

    public static function textarea($label)
    {
        return new FormBlockTextControl($label);
    }

    public static function email($label)
    {
        return new FormEmailControl($label);
    }

    public static function password($label)
    {
        return new FormPasswordControl($label);
    }

    public static function number($label)
    {
        return new FormNumberControl($label);
    }

    public static function date($label)
    {
        return new FormDateControl($label);
    }

    public static function imageUpload($label)
    {
        return new FormImageUploadControl($label);
    }

    public static function radio($label, $value, $asText = false)
    {
        return new FormRadioButtonControl($label, $value, $asText);
    }

    public static function radioGroup($label, $controls)
    {
        return new FormRadioGroupControl($label, $controls);
    }

    public static function htmlDate($y, $m, $d)
    {
        return date('Y-m-d');
    }

    public static function hidden()
    {
        return new FormHiddenControl('');
    }    

    public static function form($label, $controls) {
        return new Form($label, $controls);
    }
}
