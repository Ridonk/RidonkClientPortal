<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/22/17
 * Time: 2:45 PM
 */

namespace Ridonk\ClientPortal\Models;


class DatabaseNewUser {
    private $userData;
    private $connect;

    public function __construct($userData, $connect) {
        $this->userData = $userData;
        $this->connect = $connect;
    }
}