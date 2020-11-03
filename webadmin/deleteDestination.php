<?php
session_start();


require_once('./database/Instances.php');


//delete category ajax
if (!empty($_GET)) {
    $id = $_GET['id'];

    $activity->deleteInstance('destinations', $id);

    $_SESSION['SuccessMessage'] = "Destination deleted successfully";
} else {
    $_SESSION['ErrorMessage'] = "Failed to delete destination";
}
