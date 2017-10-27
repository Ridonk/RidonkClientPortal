<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:10 AM
 */

namespace Ridonk\ClientPortal\Models;

class DatabaseNewClient {
    /**
     * @param array $userData
     * @param string | bool $callback
     * @param \PDO $connect
     * @return bool
     */
    public static function insertNewClient(Array $userData, $callback = FALSE, \PDO $connect) {
        /*
         * First make sure the user doesn't already exist. If it does, return to the callback location if one was specified.
         */
        if (DatabaseSelectClient::checkIfEmailExists($userData['email'], $connect)) {
            if ($callback != FALSE) {
                header('Location:' . $callback);
            } else {
                echo "Email exists.";
                return FALSE;
            }
        } else {
            /*
             * Next: prepare the insert statement to PDO standards and then execute it with the provided $_POST data.
             */
            $sql = 'INSERT INTO client_db (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)';
            $stmt = $connect->prepare($sql);
            $firstname = $userData['firstname'];
            $lastname = $userData['lastname'];
            $email = $userData['email'];
            $password = $userData['password'];
            $stmt->bindParam('firstname', $firstname);
            $stmt->bindParam('lastname', $lastname);
            $stmt->bindParam('email', $email);
            $stmt->bindParam('password', $password);
            try {
                $stmt->execute();
                return TRUE;
            } catch (\PDOException $e) {
                echo $e->getMessage();
                return FALSE;
            }
        }
        return TRUE;
    }
}