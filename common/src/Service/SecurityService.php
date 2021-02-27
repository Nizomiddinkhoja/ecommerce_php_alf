<?php


class SecurityService
{
    /**
     * @param $user
     * @param $password
     * @return bool
     * @throws Exception
     */
    public function checkPassword($user, $password)
    {

        if (empty($user)) {
            throw new Exception('User not found', 404);
        }

        if (UserService::encodePassword($password) !== $user['password']) {
            throw new Exception('Incorrect password', 400);

        }
        return true;
    }


    public static function redirectToStartPage()
    {
        header('location: ?/');
        die();
    }


    public static function redirectToLoginPage()
    {
        header('location: ?model=site&action=login');
        die();
    }

    public static function isAuthorized()
    {
        if (empty(UserService::getCurrentUser())) return false;

        return true;
    }

    public static function getPermissionNameByControllerAndAction($controller, $action)
    {
        return strtoupper($controller) . '_' . strtoupper($action);
    }
}
