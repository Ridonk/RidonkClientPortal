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
        <title><?php echo 'UsernameHere'; ?></title>
    </head>
    <body>
    <?php
    $dbh = new \Ridonk\ClientPortal\Models\Database();
    $firstname = \Ridonk\ClientPortal\Models\DatabaseSelectClient::getFirstNameWhereEmailMatches($_SESSION['email'], $dbh->getConnect());
    if ($firstname != FALSE) {
        echo 'Hello ' . $firstname . '. <br />';
    } else {
        echo 'Something broke...';
    }
    echo '<a href="logout.php">Logout</a>';
    ?>
    </body>
    </html>
<?php