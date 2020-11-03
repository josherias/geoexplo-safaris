<?php
require_once('./webadmin/database/Instances.php');
$id = $_GET['id'];

$activityDetails = $activity->displaySingleInstance('activities', $id);

$activityDetails = $activityDetails[0];


?>
<?php require_once('./includes/header.inc.php'); ?>

<!-----hero activities- --- -->
<section class="hero" style="background: url('<?php echo $targetPath . "assets/images/activities_db/" .  htmlentities($activityDetails['photo'] ?? 'lake-mburo-zebras.jpg'); ?>'); 
  background-size: cover; background-position: center;
  ">
    <div class="hero-background">
        <div class="container">
            <div class="hero-flex">
                <h1><?php echo $activityDetails['title']; ?></h1>
                <h5 class="text-center"><?php echo $activityDetails['short_desc']; ?></h5>
            </div>
        </div>
    </div>
</section>

<section class="activity-description">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5>Description</h5>
                <?php echo $activityDetails['description']; ?>

            </div>
            <div class="col-md-4">


                <h5>Countries &nbsp; <i class="fas fa-map-marker-alt"></i></h5>
                <?php

                $activityCountriesArray = explode(',', $activityDetails['countries']);
                foreach ($activityCountriesArray as $country) : ?>
                    <span><?php echo $country; ?></span> <br>

                <?php endforeach; ?>
                <br>
                <h5 class="mt-4">Price</h5>
                <span>$<?php echo $activityDetails['price']; ?></span>
                <br>
                <h5 class="mt-4">Destinations</h5>
                <span>Nakuru</span>
            </div>
        </div>
    </div>
</section>


<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>