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
echo '<a href="logout.php">Logout</a>';
?>
</body>
</html>