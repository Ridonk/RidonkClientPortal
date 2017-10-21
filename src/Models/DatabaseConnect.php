<?php

namespace Ridonk\ClientPortal\Models;


class DatabaseConnect {
    private $driver = "mysql";
    private $host = "localhost";
    private $port = "3306";
    private $schema = "default";
    private $username = "root";
    private $password = "";
    protected $connected = FALSE;
    protected $connection;

    /**
     * DatabaseConnect constructor.
     *
     * By default expects to be called from index in Project/public
     * If not then should pass through appropriate location of file relative to calling file
     *
     * @param $file
     */
    public function __construct($file = "../config/db-config.ini") {
        $this->connect($file);
    }

    /**
     * DatabaseConnect connect
     *
     * connects to the database using either the config/db-config.ini or with sane defaults
     * can be overridden by passing through a different ini file as a parameter
     *
     * @param string $file
     */
    protected function connect($file) {
        if ($settings = parse_ini_file($file, TRUE)) {
            $this->driver = $settings['database']['driver'];
            $this->host = $settings['database']['host'];
            $this->port = $settings['database']['port'];
            $this->schema = $settings['database']['schema'];
            $this->username = $settings['database']['username'];
            $this->password = $settings['database']['password'];
        }
        $dsn = $this->driver . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->schema;
        try {
            $this->connection = new \PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        $this->connected = TRUE;
    }

    public function getConnected() {
        return $this->connected;
    }

    /**
     * @return \PDO | false
     */
    public function getConnection() {
        if (isset($this->connection)) {
            return $this->connection;
        } else {
            return FALSE;
        }
    }
}