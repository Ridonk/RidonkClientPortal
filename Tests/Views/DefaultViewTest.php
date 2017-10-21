<?php
namespace Ridonk\ClientPortal;
use PHPUnit\Framework\TestCase;
use Ridonk\ClientPortal\Views\DefaultView;

class DefaultViewTest extends TestCase {
    public function testNewDefaultViewWorks() {
        $defaultView = new DefaultView();
        $this->assertTrue($defaultView->newView());
    }
}