<?php
session_start();


//require the instances file
require_once('./database/Instances.php');


// require all the functions in one file 
include("./functions.inc.php");



if (!empty($_POST) &&  isset($_POST['add_package'])) {

    $packageName          = $_POST['packageName'];
    $packageAccomodation  = $_POST['packageAccomodation'];
    $packageDays          = $_POST['packageDays'];
    $packagePrice         = $_POST['packagePrice'];
    $packageCountry       = $_POST['packageCountry'];
    $packageArticle       = $_POST['packageArticle'];
    $packagePublish      = $_POST['packagePublish'];

    if ($packagePublish == 'on') {
        $packagePublish = 1;
    } else {
        $packagePublish = 0;
    }


    $packageImage     = $_FILES['packageImage']['name'];
    $target_path = "../assets/images/packages/" . basename($_FILES['packageImage']['name']);



    move_uploaded_file($_FILES['packageImage']['tmp_name'], $target_path);

    //store the form data in array
    $data = [
        'packageName' => $packageName,
        'packageAccomodation' => $packageAccomodation,
        'packageDays' => $packageDays,
        'packagePrice' => $packagePrice,
        'packageCountry' => $packageCountry,
        'packageArticle' => $packageArticle,
        'packagePublish' => $packagePublish,
        'packageImage' => $packageImage,
    ];

    //add package to database
    $package->AddPackage($data);

    $_SESSION['SuccessMessage'] = "Package added successfully";


    Redirect('packages.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to add package to database";

    Redirect('packages.php');
}
