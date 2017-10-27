<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:44 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>CP Login</title>
    <?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $loginController = new \Ridonk\ClientPortal\Controllers\Login($_POST);
        if (!$loginController->checkLogin()) {
            echo $loginController->getErrorMessage();
        } else {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['login'] = '';
            header('Location:index.php');
        }
    } else {
        $message = 'Please enter your email and password below or click "Register for service" below the form.<br />';
    }
    ?>
</head>
<body>
<?php
if (isset($message)) {
    echo $message . '<br />';
}
?>
<form action="login.php" method="post">
    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" placeholder="janedoe@example.com" required><br/>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="*********" required><br/>
    <input type="submit" id="submit" name="submit" value="Log In">
</form>
<small><a href="register.php">Register for service</a>&nbsp;|&nbsp;<a href="#">Forgot Password</a></small>
</body>
</html>
