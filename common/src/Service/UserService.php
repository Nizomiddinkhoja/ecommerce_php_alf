<?php

class UserService
{

    public function getCurrentUser()
    {
        $user = $_SESSION['current_user'] ?? null;
        return !empty($user) ? unserialize($user) : [];
    }

    public static function saveUserData($user)
    {
        $_SESSION['current_user'] = serialize($user);

    }

}
