<?php
session_start();
require_once (__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>CP Index</title>
    <?php
    if (!isset($_SESSION['login'])) {
        header("Location:login.php");
        exit;
    } elseif ($_SESSION['login'] != '') {
        header("Location:login.php");
        exit;
    }
    ?>
</head>
<body>
<?php
echo '<h1>The index</h1>';
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