<?php
require_once('./functions.inc.php');

session_start();
unset($_SESSION['user']);
Redirect("index.php");
