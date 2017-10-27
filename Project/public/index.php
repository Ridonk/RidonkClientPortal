<?php
session_start();
require_once (__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>CP Index</title>
    <?php
    if (!isset($_SESSION['login']) && $_SESSION['login'] != '') {
        header("login.php");
        exit;
    }
    ?>
</head>
<body>
<?php
echo 'Index.php';
?>
</body>
</html>