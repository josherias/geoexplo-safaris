<?php
session_start();

require_once('./database/Instances.php');
require_once('./functions.inc.php');

//login credentials
$username = 'user';
$password = 'pass';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        Redirect("index.php?Empty=All fields must be filled");
    } else {

        $authData = $auth->getCredentials('login', $password, $username);

        if (!empty($authData)) {

            $_SESSION['user'] = $authData[0]['username'];

            Redirect('dashboard.php');
        } else {
            Redirect("index.php?Invalid=Incorrect user credentials");
        }
    }
}
