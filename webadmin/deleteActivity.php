<?php
session_start();


require_once('./database/Instances.php');


//delete category ajax
if (!empty($_GET)) {
    $id = $_GET['id'];

    $activity->deleteInstance('activities', $id);

    $_SESSION['SuccessMessage'] = "Activity deleted successfully";
} else {
    $_SESSION['ErrorMessage'] = "Failed to delete activity";
}
