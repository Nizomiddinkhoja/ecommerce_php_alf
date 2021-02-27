<?php


class SecurityService
{
    public function checkPassword($login, $password)
    {

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
