<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:10 AM
 */

namespace Ridonk\ClientPortal\Models;


class Database {
    protected $dsn;
    protected $username;
    protected $password;
    protected $connect;

    public function __construct() {
        $defaultFile = '../../Project/config/db-config.ini';
        if ($this->parseFile($defaultFile)) {
            try {
                $this->connect = new \PDO($this->dsn, $this->username, $this->password);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    /**
     * @param string $fileLocation
     * @return bool
     */
    private function parseFile(string $fileLocation) {
        if (isset($fileLocation)) {
            if ($settings = parse_ini_file($fileLocation, TRUE)) {
                $fileData['driver'] = $settings['database']['driver'];
                $fileData['host'] = $settings['database']['host'];
                $fileData['port'] = $settings['database']['port'];
                $fileData['schema'] = $settings['database']['schema'];
                $this->username = $settings['database']['username'];
                $this->password = $settings['database']['password'];
            } else return FALSE;
        } else return FALSE;
        $this->dsn = $fileData['driver'] . ':host=' . $fileData['host'] . ';dbname=' . $fileData['schema'];
        return TRUE;
    }

    public function getConnect() {
        return $this->connect;
    }
}