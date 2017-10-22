<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/22/17
 * Time: 9:41 AM
 */

namespace Ridonk\Models;


use PHPUnit\Framework\TestCase;
use Ridonk\ClientPortal\Models\DatabaseConnect;
use Ridonk\ClientPortal\Models\DatabaseNewUser;

class TestInsertNewUser extends TestCase {
    public function testCanPrepareStatement() {
        $file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Project' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db-config.ini';
        $dbh = new DatabaseConnect($file);
        $this->assertTrue($dbh->getConnected());
        $connect = $dbh->getConnection();
        $count = $connect->exec('SELECT * FROM `client_db`');
        $this->assertGreaterThan(0, $count);
    }

    public function testInsertNewUserReturnsTrue() {
        echo 'Setting test data: ';
        $file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Project' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db-config.ini';
        $testData = Array(
            'firstname' => 'jane',
            'lastname' => 'doe',
            'email' => 'jane@doe.com',
            'password' => password_hash('testCase', PASSWORD_DEFAULT),
            'status' => 'pending'
        );
        print_r($testData);
        echo $file;
        $dbh = new DatabaseConnect($file);
        $newUser = new DatabaseNewUser($dbh->getConnection(), $testData);
        $this->assertEquals(0, $newUser->getErrorCode());
    }
}