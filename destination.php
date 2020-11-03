<?php require_once('./includes/header.inc.php');
require_once('./webadmin/database/Instances.php');
?>

<?php
$country_id = $_GET['country_id'];

$countryDetails = $destination->displaySingleInstance('countries', $country_id);

$countryDetails = $countryDetails[0];

$activities = $countryDetails['activities'];

//split the countries activities string into array
$countryActivitiesArray  =  explode(",", $activities);



?>


<!-----hero activities- --- -->
<section class="hero" style="background: url('./assets/images/destinations/rwenzori-1.jpg'); 
  background-size: cover; background-position: center;
  ">
    <div class="hero-background">
        <div class="container">
            <div class="hero-flex">
                <h1><?php echo $countryDetails['title'] ?? 'title'; ?></h1>
                <h5><?php echo $countryDetails['tagline']  ?? 'tagline'; ?></h5>
            </div>
        </div>
    </div>
</section>

<section class="destination-description">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5>Description</h5>

                <?php echo  $countryDetails['description'] ?? 'Description'; ?>


                <!-- whEn to go Visit -->
                <h5 class="my-3">When to go ?</h5>
                <?php echo  trim($countryDetails['when_to_go'], "[\]\"")  ?? 'Why visit'; ?>

            </div>
            <div class="col-md-4 my-3">
                <h5>About</h5>
                <span><strong>Country</strong> : <?php echo  $countryDetails['title'] ?? 'Description'; ?></span>
                <br>
                <br> <br>
                <h5>PLACES</h5>
                <?php echo  $countryDetails['places'] ?? 'Description'; ?>


            </div>
        </div>
    </div>
</section>

<!-- Trending Activities -->
<section class="activities">
    <div class="container">
        <h2 class="mb-4 text-left py-2">Activities in <?php echo $countryDetails['title'] ?></h2>

        <div class="row m-1">
            <div class="grid grid-destination">

                <?php foreach ($countryActivitiesArray as $activityId) :

                    $activityDest = $activity->displaySingleInstance('activities', $activityId);
                ?>
                    <div class="grid-col col-two">
                        <img src="<?php echo $targetPath . "assets/images/activities_db/" .  htmlentities($activityDest[0]['photo'] ?? 'lake-mburo-zebras.jpg'); ?>" alt="img">
                        <div class="col-text">
                            <h5><?php echo htmlentities($activityDest[0]['title'] ?? 'Title'); ?></h5>
                            <a href="<?php printf('%s?id=%s', 'single-activity.php', $activityDest[0]['id'] ?? 1); ?>" class="btn btn-success btn-sm my-2">Explore More &nbsp; <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                <?php endforeach ?>



            </div>
        </div>
    </div>
</section>


<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>