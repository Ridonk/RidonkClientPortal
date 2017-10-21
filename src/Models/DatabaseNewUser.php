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
    private $username;
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
        $stmt = $this->dbh->prepare("INSERT INTO client_db (username, hashed_password, email, status) VALUES (:username, :password, :email, :status)");
        $stmt->bindValue(":username", $this->username);
        $stmt->bindValue(":password", $this->password);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":status", $this->status);
        $this->username = $this->userData['username'];
        $this->password = password_hash($this->userData['password'], PASSWORD_DEFAULT);
        $this->email = $this->userData['email'];
        $this->status = $this->userData['status'];
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

}