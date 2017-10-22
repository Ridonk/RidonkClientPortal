<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/22/17
 * Time: 8:56 AM
 */

namespace Ridonk\ClientPortal\Views;


class ConfirmationView {
    protected $controller;
    public function __construct($controller) {
        $this->controller = $controller;
        include('Templates/ConfirmationTemplate.php');
    }
}