<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/22/17
 * Time: 2:28 PM
 */

namespace Ridonk\Controllers;

use PHPUnit\Framework\TestCase;
use Ridonk\ClientPortal\Controllers\NewUserController;

class NewUserControllerTest extends TestCase {
    private $newUserController;
    private $registerView;

    public function testRegisterViewGetsSet() {
        $this->newUserController = new NewUserController();
        $this->registerView = $this->newUserController->getRegisterView();
        $this->assertNotFalse($this->registerView, "Should not be false");
    }
}