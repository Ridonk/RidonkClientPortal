<?php
session_start();
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:49 AM
 */
if (!isset($_SESSION['login']) && $_SESSION['login'] != '') {
    /*
     * If all required information is passed via post, then process and register the user. If registration succeeds log the user in.
     */
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
        // TODO: Call new user controller
        echo 'Information received';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CP Register New Client</title>
</head>
<body>
<form action="register.php" method="post">
    <label for="firstname">First Name: </label>
    <input type="text" id="firstname" name="firstname" placeholder="Jane" required>
    <label for="lastname">Last Name: </label>
    <input type="text" id="lastname" name="lastname" placeholder="Doe" required>
    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" placeholder="janedoe@example.com" required>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="*********" required>
    <input type="submit" id="submit" name="submit" value="Register Now">
</form>
</body>
</html>
