<?php
require_once('./database/Instances.php');


if (!empty($_POST)) {
    $id = $_POST['id'];

    $packageData = $package->displaySingleInstance('safaris', $id);
    echo json_encode($packageData);
}
