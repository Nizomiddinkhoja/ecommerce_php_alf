<?php

/**
 * For Flash Message
 *
 * Class MessageService
 */
class MessageService
{
    const KEY_ERROR_MESSAGE = 'KEY_ERROR_MESSAGE';
    const KEY_MESSAGE = 'KEY_MESSAGE';

    public static function setError($message)
    {
        $_SESSION[self::KEY_ERROR_MESSAGE] = $message;
    }

    public static function displayError()
    {
        if (!isset($_SESSION[self::KEY_ERROR_MESSAGE])) return null;
        $error = $_SESSION[self::KEY_ERROR_MESSAGE];
        unset($_SESSION[self::KEY_ERROR_MESSAGE]);
        return $error;
    }

    public static function setMessage($message)
    {
        $_SESSION[self::KEY_MESSAGE] = $message;
    }

    public static function displayMessage()
    {
        if (!isset($_SESSION[self::KEY_MESSAGE])) return null;
        $message = $_SESSION[self::KEY_MESSAGE];
        unset($_SESSION[self::KEY_MESSAGE]);
        return $message;
    }
}
