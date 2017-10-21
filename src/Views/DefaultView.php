<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 10/14/2017
 * Time: 6:21 PM
 */

namespace Ridonk\ClientPortal\Views;


class DefaultView {
    public function __construct() {
        return $this->newView();
    }
    public function newView() {
        if(include('Templates/DefaultTemplate.php')) {
            return true;
        } else {
            return false;
        }
    }
}