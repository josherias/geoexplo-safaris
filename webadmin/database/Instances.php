<?php

spl_autoload_register(function ($className) {
    require_once("$className.php");
});


$db = new Database();

$activity = new Activity($db);

$blog = new Blog($db);

$destination = new Destination($db);

$package = new Package($db);

$auth = new Auth($db);


$targetPath = "http://localhost/geoexplo/";
