<?php


class Validator
{

    public static function emailValidate($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function phoneValidate($phone)
    {
//        "+992-98-765-43-21", "992987654321", "987654321"
        $regx = "/\+?([0-9]{3})?-?([0-9]{2})-?([0-9]{3})-?([0-9]{2})-?([0-9]{2})/u";

        if (preg_match($regx, $phone)) {
            return true;
        }
        return false;
    }
}
