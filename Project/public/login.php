<?php
session_start();
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
        echo 'Checking login...<br />';
        echo 'Login script not written yet.<br />';
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['login'] = '';
        header('Location:index.php');
    } else {
        $message = 'Email or password not supplied. Please try again.<br />';
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
    <input type="email" id="email" name="email" placeholder="janedoe@example.com" required>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="*********" required>
    <input type="submit" id="submit" name="submit" value="Log In">
</form>
<small><a href="register.php">Register for service</a>&nbsp;|&nbsp;<a href="#">Forgot Password</a></small>
</body>
</html>
