<?php
session_start();


require_once('./database/Instances.php');


//delete category ajax
if (!empty($_GET)) {
    $id = $_GET['id'];

    $activity->deleteInstance('blog_tb', $id);

    $_SESSION['SuccessMessage'] = "Blog deleted successfully";
} else {
    $_SESSION['ErrorMessage'] = "Failed to delete blog";
}
