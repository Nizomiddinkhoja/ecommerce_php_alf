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
}
