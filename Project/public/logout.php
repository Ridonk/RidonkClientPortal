<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['login']);
header("Location: index.php");
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 10/27/17
 * Time: 11:35 AM
 */
