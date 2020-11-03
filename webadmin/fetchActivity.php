<?php
require_once('./database/Instances.php');


if (!empty($_POST)) {
    $id = $_POST['id'];

    $activityData = $activity->displaySingleInstance('activities', $id);
    echo json_encode($activityData);
}
