<?php


class ValidationService
{
    public static function validate($comment, $value)
    {
        $data = AnnotationHelper::defineValueByAnnotation('valid', $comment);
        $data = json_decode($data . " ", true);

        foreach ($data as $key => $validateValue) {
            switch ($key) {
                case 'type':
                    self::typeValidate($validateValue, $value);
                    break;
                case 'maxLength':
                    self::maxLengthValidate($validateValue, $value);
                    break;
                case 'max':
                    self::maxValidate($validateValue, $value);
                    break;
            }
        }
        return true;
    }

    public static function typeValidate($validateValue, $value)
    {
        switch ($validateValue) {
            case 'string':
                if (!is_string($value)) {
                    return false;
                }
                break;
            case 'int':
                if (!is_int($value)) {
                    return false;
                }
                break;
        }
        return true;
    }

    public static function maxLengthValidate($validateValue, $value)
    {
        if ($validateValue > strlen($value)) {
            return false;
        }
        return true;
    }

    public static function maxValidate($validateValue, $value)
    {
        if ($validateValue > $value) {
            return false;
        }
        return true;
    }
}
