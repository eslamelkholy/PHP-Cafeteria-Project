<?php
class Validation
{
    public static function validateText ($str)
    {
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        return $str;
    }

    public static function validateNumber ($number)
    {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
        $number = abs($number);
        return $number;
    }
    
    public static function validateEmail($text)
    {
        $text = filter_var($text, FILTER_SANITIZE_EMAIL);
        return $text;
    }
}?>