<?php
session_start();


//require the instances file
require_once('./database/Instances.php');


// require all the functions in one file 
include("./functions.inc.php");


if (!empty($_POST) &&  isset($_POST['edit_activity'])) {

    $id  = $_POST['activityId'];

    $id = intval($id); //convert string to int


    var_dump($id);

    $activityTitle         = $_POST['activityTitle'];
    $activityCountries  = $_POST['activityCountries'];
    $activityPrice  = $_POST['activityPrice'];
    $activityShortDesc  = $_POST['activityShortDesc'];
    $activityDescription  = $_POST['activityDescription'];

    $activityImage     = $_FILES['activityImage']['name'];
    $target_path = "../assets/images/activities_db/" . basename($_FILES['activityImage']['name']);


    move_uploaded_file($_FILES['activityImage']['tmp_name'], $target_path);

    //store the form data in array
    $data = [
        'activityTitle' => $activityTitle,
        'activityCountries' => $activityCountries,
        'activityPrice' => $activityPrice,
        'activityShortDesc' => $activityShortDesc,
        'activityDescription' => $activityDescription,
        'activityImage' => $activityImage
    ];


    $activity->editActivity($data, $id);

    $_SESSION['SuccessMessage'] = "activity edited successfully";

    Redirect('acivities.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to edit activity";

    Redirect('acivities.php');
}
