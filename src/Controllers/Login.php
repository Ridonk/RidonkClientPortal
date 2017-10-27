<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 11:14 AM
 */

namespace Ridonk\ClientPortal\Controllers;

use Ridonk\ClientPortal\Models\Database;
use Ridonk\ClientPortal\Models\DatabaseSelectClient;

class Login {
    protected $databaseModel;
    protected $email;
    protected $password;
    protected $errorMessage;

    public function __construct(array $formData) {
        $this->databaseModel = new Database();
        $this->email = $formData['email'];
        $this->password = password_hash($formData['password'], PASSWORD_DEFAULT);
        if (DatabaseSelectClient::checkIfEmailExists($this->email, $this->databaseModel->getConnect())) {
            if ($this->checkPassword()) {
                return TRUE;
            } else {
                $this->errorMessage = 'Password did not match.';
                return FALSE;
            }
        } else {
            $this->errorMessage = 'Email not found in our system.';
            return FALSE;
        }
    }

    private function checkPassword() {
        if ($databasePassword = DatabaseSelectClient::getPasswordWhereEmailMatches($this->email, $this->databaseModel->getConnect())) {
            return (password_verify($this->password, $databasePassword));
        } else {
            return FALSE;
        }
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}