<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/31/17
 * Time: 9:37 AM
 */

namespace Ridonk\ClientPortal\Controllers;

use Ridonk\ClientPortal\Models\Database;
use Ridonk\ClientPortal\Views;

class Profile {
    protected $database;
    protected $viewProfile;

    public function __construct($session) {
        $this->database = new Database();
        $this->viewProfile = new Views\Profile($this->database->getConnect(), $session);
    }

    public function getProfile() {
        return $this->viewProfile;
    }
}