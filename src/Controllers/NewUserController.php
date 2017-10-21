<?php

namespace Ridonk\ClientPortal\Controllers;
use Ridonk\ClientPortal\Models\DatabaseConnect;
use Ridonk\ClientPortal\Models\DatabaseNewUser;


class NewUserController {
    private $model;
    private $dbh;
    private $userdata;
    public function __construct() {
        $this->dbh = new DatabaseConnect();
        $this->userdata = $this->verifyUserData($_POST);
        $this->model = new DatabaseNewUser($this->dbh->getConnection(), $this->userdata);
        if ($this->model->getErrorCode() == 0) {
            // TODO: Add logged in view when it is created.
            echo '<h1>Success!</h1>';
        }
    }
    private function verifyUserData($userdata) {
        return $userdata; // TODO: Add backend form verification
    }
}