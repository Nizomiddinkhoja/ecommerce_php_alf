<?php


class SecurityService
{
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


    public function redirectToStartPage()
    {
        header('location: /shop/frontend/index.php');
        die();
    }


    public function redirectToLoginPage()
    {
        header('location: /shop/frontend/index.php?model=site&action=login');
        die();
    }
}
