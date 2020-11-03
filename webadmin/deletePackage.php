<?php
session_start();


require_once('./database/Instances.php');


//delete category ajax
if (!empty($_GET)) {
    $id = $_GET['id'];

    $package->deleteInstance('safaris', $id);

    $_SESSION['SuccessMessage'] = "Package deleted successfully";
} else {
    $_SESSION['ErrorMessage'] = "Failed to delete package";
}
