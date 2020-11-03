<?php
session_start();


//require the instances file
require_once('./database/Instances.php');


// require all the functions in one file 
include("./functions.inc.php");


if (!empty($_POST) &&  isset($_POST['add_destination'])) {

    $destinationTitle          = $_POST['destinationTitle'];
    $destinationCountry  = $_POST['destinationCountry'];
    $destinationDescription       = $_POST['destinationDescription'];

    $destinationImage     = $_FILES['destinationImage']['name'];
    $target_path = "../assets/images/destinations" . basename($_FILES['destinationImage']['name']);



    move_uploaded_file($_FILES['destinationImage']['tmp_name'], $target_path);

    //store the form data in array
    $data = [
        'destinationTitle' => $destinationTitle,
        'destinationCountry' => $destinationCountry,
        'destinationDescription' => $destinationDescription,
        'destinationImage' => $destinationImage,
    ];

    //add destination to database
    $destination->addDestination($data);

    $_SESSION['SuccessMessage'] = "Destination added successfully";


    Redirect('destinations.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to add destination to database";

    Redirect('destinations.php');
}
