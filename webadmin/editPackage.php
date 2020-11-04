<?php
session_start();


//require the instances file
require_once('./database/Instances.php');


// require all the functions in one file 
include("./functions.inc.php");


if (!empty($_POST) &&  isset($_POST['edit_package'])) {

    $id  = $_POST['packageId'];

    $id = intval($id); //convert string to int


    var_dump($id);

    $packageName         = $_POST['packageName'];
    $packageAccomodation  = $_POST['packageAccomodation'];
    $packageDays  = $_POST['packageDays'];
    $packagePrice  = $_POST['packagePrice'];
    $packageCountry  = $_POST['packageCountry'];
    $packageArticle  = $_POST['packageArticle'];

    $packageImage  = $_POST['packageImage'];

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
        'packageImage' => $packageImage
    ];

    //add destination to database
    $package->editPackage($data, $id);

    $_SESSION['SuccessMessage'] = "Package edited successfully";

    Redirect('packages.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to edit Package";

    Redirect('packages.php');
}
