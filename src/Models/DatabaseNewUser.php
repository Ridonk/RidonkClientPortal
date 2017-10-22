<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 10/15/2017
 * Time: 8:04 AM
 */

namespace Ridonk\ClientPortal\Models;


class DatabaseNewUser {
    private $dbh;
    private $userData;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $status;
    private $errorCode;

    /**
     * DatabaseNewUser constructor.
     *
     * @param \PDO $dbh
     * @param $userData
     */
    public function __construct($dbh, $userData) {
        $this->dbh = $dbh;
        $this->userData = $userData;
        if ($this->insertNewUser()) {
            $this->errorCode = 0;
        } else $this->errorCode = 1;
    }

    /**
     * @return bool
     */
    public function insertNewUser() {
        echo 'Preparing statement.';
        $stmt = $this->dbh->prepare("INSERT INTO client_db (firstname, lastname, password, email, status) VALUES (:firstname, :lastname, :password, :email, :status)");
        $stmt->bindValue(":firstname", $this->firstname);
        $stmt->bindValue(":lastname", $this->lastname);
        $stmt->bindValue(":password", $this->password);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":status", $this->status);
        $this->firstname = $this->userData['firstname'];
        $this->lastname = $this->userData['lastname'];
        $this->password = password_hash($this->userData['password'], PASSWORD_DEFAULT);
        $this->email = $this->userData['email'];
        $this->status = $this->userData['status'];
        $stmt->execute();
        if ($stmt->rowCount() > 0 && !$stmt->errorCode()) {
            echo $stmt->errorCode();
            return true;
        } else {
            echo $stmt->errorCode();
            return false;
        }
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

}