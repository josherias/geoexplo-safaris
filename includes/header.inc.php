<?php
include('./webadmin/database/Instances.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geoxplo Tours | Travel</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo $targetPath ?>assets/css/bootstrap.min.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?php echo $targetPath ?>assets/css/all.css">

    <!-- owl carousel css -->
    <link rel="stylesheet" href="<?php echo $targetPath ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $targetPath ?>assets/css/owl.theme.default.min.css">

    <!-- style.css -->
    <link rel="stylesheet" href="<?php echo $targetPath ?>assets/css/style.css">

    <!-- jquery -->
    <script src="<?php echo $targetPath ?>assets/js/jquery.min.js"></script>

    <!-- bootsrap js -->
    <script src="<?php echo $targetPath ?>assets/js/bootstrap.min.js"></script>

    <!-- owl carousel js -->
    <script src="<?php echo $targetPath ?>assets/js/owl.carousel.min.js"></script>

    <!-- index js -->
    <script src="<?php echo $targetPath ?>assets/js/index.js"></script>

</head>

<body>
    <Header>
        <div class="container header-container" id="header-container">
            <div class="row align-items-center">

                <div class="col-md-2 mb-2 header-icon">
                    <img src="<?php echo $targetPath ?>assets/icons/signature-logo.png" class="" alt="">
                </div>

                <div class="col-md-3 flex-icon mb-2 d-none d-md-block">
                    <div class="circle_icon">
                        <i class="fas fa-envelope-square"></i>
                    </div>

                    <div class="header-text">
                        <h5>FOR SUPPORT MAIL US</h5>
                        <span>goxplo.tours@gmail.com</span>
                    </div>
                </div>

                <div class="col-md-4 flex-icon mb-2 d-none d-md-block">
                    <div class="circle_icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="header-text">
                        <h5>FOR INQUIRIES CALL US</h5>
                        <span>+256 753 499842</span>
                    </div>
                </div>

                <div class="col-md-3 social-icons mb-2 d-none d-md-block">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-google-plus-square"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-twitter-square"></i>
                </div>

            </div>
        </div>

        <!-- navbar -->

        <nav class="navbar navbar-expand-lg  bg-green navbar-dark">
            <button class="navbar-toggler mb-3" style="outline: none;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon toggler"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav nav-text-color">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $targetPath ?>home">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $targetPath ?>activities">Activities</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $targetPath ?>packages">Packages</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="destinations.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Destinations
                        </a>
                        <div class="dropdown-menu p-3" aria-labelledby="navbarDropdownMenuLink">

                            <?php

                            $destinationsCountries = $destination->displayCollection('countries');

                            foreach ($destinationsCountries as $country) :
                            ?>

                                <a class="dropdown-item py-2" href="<?php echo $targetPath ?>destination.php?country_id=<?php echo $country['id']; ?>"><?php echo $country['title']; ?></a>
                            <?php endforeach;
                            ?>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $targetPath ?>blogs">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $targetPath ?>about-us">About Us</a>
                    </li>
                </ul>
            </div>
        </nav>

    </Header>