<?php

namespace Ridonk\ClientPortal\Views;

class RegisterView {
    private $model;
    private $controller;
    public function __construct() {
        include('Templates/RegisterTemplate.php');
    }
    public function registerModel($databaseNewUser) {
        $this->model = $databaseNewUser;
    }
    public function registerController($processRegisterForm) {
        $this->controller = $processRegisterForm;
    }
}