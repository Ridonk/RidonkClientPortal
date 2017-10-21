<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 10/15/2017
 * Time: 7:22 AM
 */

namespace Ridonk\ClientPortal;
use PHPUnit\Framework\TestCase;
use Ridonk\ClientPortal\Models\DatabaseConnect;

class DatabaseConnectModelTest extends TestCase {
    public function testConnectedIsTrueAfterConnection() {
        $file = __DIR__ . '\..\..\Project\config\db-config.ini';
        $dbh = new DatabaseConnect($file);
        $this->assertTrue($dbh->getConnected());
    }
}