<?php

namespace Ridonk\ClientPortal\Controllers;
use Ridonk\ClientPortal\Models\DatabaseConnect;
use Ridonk\ClientPortal\Models\DatabaseNewUser;
use Ridonk\ClientPortal\Views\ConfirmationView;
use Ridonk\ClientPortal\Views\RegisterView;


class NewUserController {
    protected $newUserModel;
    protected $registerView;
    protected $connectModel;
    protected $confirmationView;
    private $userdata;
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
        $this->newUserModel = new DatabaseNewUser($this->connectModel->getConnection(), $this->userdata);
        if ($this->newUserModel->getErrorCode() == 0) {
            $this->confirmView();
        } else {
            echo 'Error occurred. Code= ' . $this->newUserModel->getErrorCode();
        }
    }
    private function verifyUserData($userdata) {
        return $userdata; // TODO: Add backend form verification
    }
    private function setRegisterView($view) {
        $this->registerView = $view;
    }
}