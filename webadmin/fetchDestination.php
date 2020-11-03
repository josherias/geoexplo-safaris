<?php
require_once('./database/Instances.php');


if (!empty($_POST)) {
    $id = $_POST['id'];

    $destinationData = $destination->displaySingleInstance('destinations', $id);
    echo json_encode($destinationData);
}
