<?php

/**
 * Created by PhpStorm.
 * User: nucur
 * Date: 10/3/2016
 * Time: 3:51 PM
 */
class Validation
{

    //isset empty validation
    public function issetEmpty($value)
    {
        if (isset($value) && !empty($value)) {
            return true;
        }
    }

    //alphabets without space validation
    public function letter($value)
    {
        if (!preg_match("/^[a-zA-Z]*$/", $value)) {
            return true;
        }
    }

    //alphabets with space validation
    public function letterSp($value)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $value)) {
            return true;
        }
    }

    //chars validation
    public function mixedStr($value)
    {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!-\/]{1,}$/', $value)) {
            return true;
        }
    }

    //number validation
    public function number($value)
    {
        if (!preg_match("/^[0-9]*$/", $value)) {
            return true;
        }
    }

    //length validation
    public function length($value, $start, $end)
    {
        if($start <= $end){
            if(strlen($value) >= $start && strlen($value) <= $end)
                return true;
        }
    }

    //phone no validation /
    public function phone($value)
    {
        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $value)) {
            return true;
        }
    }

    //email validation
    public function email($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }

    //zip code checking
    public function zip($value)
    {
        if (!preg_match('/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/', $value)) {
            return true;
        }
    }
}
$validation = new Validation();