<?php

namespace Ridonk\ClientPortal\Models;

use MysqliDb;


/**
 * Class DatabaseConnect
 *
 * DatabaseConnect is a model for instantiating a MysqliDb connection and storing it within itself.
 * The Connection can be accessed using DatabaseConnect::getConnection() or MysqliDb::getInstance()
 *
 * @package Ridonk\ClientPortal\Models
 */
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
            $this->driver = $settings['database']['driver']; // TODO: Deprecated
            $this->host = $settings['database']['host'];
            $this->port = $settings['database']['port'];
            $this->schema = $settings['database']['schema'];
            $this->username = $settings['database']['username'];
            $this->password = $settings['database']['password'];
        }
        // legacy PDO dsn - maybe include as an alternative to MysqliDb by scanning the driver setting?
        // $dsn = $this->driver . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->schema;
        if ($this->connection = new MysqliDb($this->host, $this->username, $this->password, $this->schema)) {
            $this->connected = TRUE;
        } else {
            $this->connected = FALSE;
        }
    }

    /**
     * @return bool
     */
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