<?php
ob_start();
require_once('./functions.inc.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- font awesome css -->
    <link rel="stylesheet" href="./assets/css/all.css">


    <!-- trix css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css" crossorigin="anonymous" />

    <!-- jquery -->
    <script src="./assets/js/jquery.min.js"></script>

    <!-- bootsrap js -->
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- trix editor js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix-core.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        <button class="navbar-toggler mb-3" style="outline: none;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav nav-text-color">
                <li class="nav-item active">
                    <a class="nav-link" href="packages.php">Packages <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acivities.php">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="destinations.php">Destinations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item">
                    <form action="logout.php" method="POST">
                        <button type="submit" class="nav-link" style="background: none; border:none">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>