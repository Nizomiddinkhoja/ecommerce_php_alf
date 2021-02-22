<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class AuthController
{
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    public function check()
    {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        if (!$this->securityService->checkPassword($login, $password)) {
            throw new Exception('Incorrect login or password', 403);
        }

        UserService::saveUserData([
            'id' => 1,
            'login' => $login,
            'role' => 'guest'
        ]);

        SecurityService::redirectToStartPage();


    }

    public function login()
    {
        include_once __DIR__ . "/../../views/site/login.php";
    }
}
