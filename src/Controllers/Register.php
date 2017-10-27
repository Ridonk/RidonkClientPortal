<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 10:16 AM
 */

namespace Ridonk\ClientPortal\Controllers;

use Ridonk\ClientPortal\Models\Database;
use Ridonk\ClientPortal\Models\DatabaseNewClient;

class Register {
    protected $database; // Database model
    protected $userData; // POST data from registration form
    protected $errorMessage = ''; // Initialize no message
    protected $errorCode = 0; // Error code

    /**
     * Register constructor.
     * @param array $formData
     */
    public function __construct(array $formData) {
        $this->userData = $formData;
        $this->database = $this->connectToDatabase();
        $this->userData['password'] = password_hash($this->userData['password'], PASSWORD_DEFAULT);
        $this->errorCode = $this->addNewUser();
        $this->handleErrorCode(); // Checks to see if error code is 0, anything else gets a special message.
    }

    private function connectToDatabase() {
        return new Database(); // TODO: Write some error handling.
    }

    private function addNewUser() {
        if (DatabaseNewClient::insertNewClient($this->userData, 'register.php', $this->database->getConnect())) {
            return 0;
        } else {
            return 1; // TODO: Add error handling to DatabaseNewClient
        }
    }

    private function handleErrorCode() {
        switch ($this->errorCode) {
            case 0:
                $this->errorMessage = $this->userData['firstname'] . ' has been successfully added to the database!';
                break;
            case 1:
                $this->errorMessage = "Something broke and user is not added.";
                break;
            default:
                $this->errorMessage = "An unrecognizable error has occurred.";
        }
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}