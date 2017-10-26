<?php

namespace Ridonk\ClientPortal\Controllers;

use Ridonk\ClientPortal\Models\DatabaseConnect;
use Ridonk\ClientPortal\Views\ConfirmationView;
use Ridonk\ClientPortal\Views\RegisterView;


class NewUserController {
    protected $registerView;
    protected $connectModel;
    protected $confirmationView;
    private $userdata;
    private $connect;

    public function __construct() {
        $this->initializeView();
    }

    private function initializeView() {
        $this->setRegisterView(new RegisterView($this));
    }

    public function confirmView() {
        echo '<h1>Success!</h1>';
        $this->confirmationView = new ConfirmationView($this);
    }

    public function addNewUser($userData) {
        $this->userdata = $this->verifyUserData($userData); // TODO: Later will be if statement
        $this->connectModel = new DatabaseConnect();
        $this->connect = $this->connectModel->getConnection();

    }

    private function verifyUserData($userdata) {
        return $userdata; // TODO: Add backend form verification
    }

    private function setRegisterView($view) {
        try {
            $this->registerView = $view;
        } catch (\Exception $e) {
            $this->registerView = false;
        }
    }

    public function getRegisterView() {
        return $this->registerView;
    }
}