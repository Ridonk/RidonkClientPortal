<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 9:49 AM
 */
/*
 * Only proceed to the registration page if user is not logged in. TODO: Add a default page for logged in users.
 */
if (!isset($_SESSION['login'])) {
    /*
     * If all required information is passed via post, then process and register the user. If registration succeeds log the user in.
     */
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $newUserController = new \Ridonk\ClientPortal\Controllers\Register($_POST);
        if ($newUserController->getErrorCode() != 0) {
            echo $newUserController->getErrorMessage();
        } else {
            echo 'User has been added!';
        }
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
    <input type="text" id="firstname" name="firstname" placeholder="Jane" required><br/>
    <label for="lastname">Last Name: </label>
    <input type="text" id="lastname" name="lastname" placeholder="Doe" required><br/>
    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" placeholder="janedoe@example.com" required><br/>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="*********" required><br/>
    <input type="submit" id="submit" name="submit" value="Register Now">
</form>
</body>
</html>
