<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:10 AM
 */

namespace Ridonk\ClientPortal\Models;


class DatabaseSelectClient {
    /**
     * @param $email
     * @param \PDO $connect
     * @return bool
     */
    public static function checkIfEmailExists($email, \PDO $connect) {
        $sql = 'SELECT * FROM client_db WHERE email = :email';
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':email' => $email));
        if ($stmt->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @param $email
     * @param \PDO $connect
     * @return bool
     */
    public static function getPasswordWhereEmailMatches($email, \PDO $connect) {
        $sql = 'SELECT password FROM client_db WHERE email = :email';
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':email' => $email));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetch();
            return $results['password'];
        } else {
            return FALSE;
        }
    }

    /**
     * @param $email
     * @param \PDO $connect
     * @return bool
     */
    public static function getFirstNameWhereEmailMatches($email, \PDO $connect) {
        $sql = 'SELECT firstname FROM client_db WHERE email = :email';
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':email' => $email));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetch();
            return $results['firstname'];
        } else {
            return FALSE;
        }
    }

    /**
     * @param \PDO $connect
     * @return array|bool
     */
    public static function selectAllFromDatabase(\PDO $connect) {
        $sql = 'SELECT * FROM client_db';
        try {
            $stmt = $connect->prepare($sql);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll();
            return $results;
        } else {
            return $results = FALSE;
        }
    }
}