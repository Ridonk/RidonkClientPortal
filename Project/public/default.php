<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/28/17
 * Time: 8:13 AM
 */
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Profile Page</title>
    </head>
    <body>
    <?php
    $profileController = new \Ridonk\ClientPortal\Controllers\Profile($_SESSION);
    $profileController->getProfile()->createBaseView();
    ?>
    </body>
    </html>
<?php