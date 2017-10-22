<?php

namespace Ridonk\ClientPortal\Views;

class RegisterView {
    protected $controller;
    public function __construct($controller) {
        include('Templates/RegisterTemplate.php');
        $this->setController($controller);
    }
    private function setController($controller) {
        $this->controller=$controller;
    }
    private function getController() {
        return $this->controller;
    }
}