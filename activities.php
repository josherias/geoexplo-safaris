<?php
require_once('./webadmin/database/Instances.php');

$destinationCollection = $destination->displayCollectionLimit('destinations', 8);
shuffle($destinationCollection);

$activitiesCollection = $activity->displayCollection('activities');



?>

<?php require_once('./includes/header.inc.php'); ?>


<!-----hero activities- --- -->

<section class="hero" style="background: url('./assets/images/activities_db/hiking-tanzania.jpg'); 
  background-size: cover; background-position: center;
  ">
    <div class="hero-background">
        <div class="container">
            <div class="hero-flex">
                <h1>Activities to carry out In East Africa</h1>
                <h5>Memorable things that you cant miss!</h5>
            </div>
        </div>
    </div>
</section>

<!-- activities page -->
<section class="activities-page">
    <div class="container">
        <h1>Activities Listing</h1>
        <h5>A Listing of Activities we offer</h5>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <ul class="">
                    <li class="nav-item">Game drives</li>
                    <li class="nav-item">Mountain Hiking</li>
                    <li class="nav-item">Gorilla Tracking</li>
                    <li class="nav-item">Air Baloons</li>
                    <li class="nav-item">Wildlife</li>
                </ul>
            </div>
            <div class="col-md-4 mx-auto">
                <ul class="">
                    <li class="nav-item">Chimp Tracking</li>
                    <li class="nav-item">Rock paintings</li>
                    <li class="nav-item">Rafting</li>
                    <li class="nav-item">Beach</li>
                    <li class="nav-item">Bird Viewing</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- Trending Activities -->
<section class="activities">
    <div class="container">
        <h2>Popular Activities</h2>
        <p>Gamedrives? Adrenaline rush? Primates? So many choices, so little time. East Africa offers an abundance of unforgettable experiences. It’s all here for you. The hard part is deciding how to spend your precious days in the safari center.
            Geoxplo tours now offers you a convenient way to explore the best of the jungle’s activities before you reach these sandy shores.</p>

        <div class="row">
            <div class="grid">


                <div class="grid-col col-one">
                    <img src="<?php echo $targetPath . "assets/images/activities_db/" .  htmlentities($activitiesCollection[0]['photo'] ?? 'lake-mburo-zebras.jpg'); ?>" alt="img">
                    <div class="col-text">
                        <h5><?php echo htmlentities($activitiesCollection[0]['title'] ?? 'Title'); ?></h5>
                        <a href="<?php printf('%s?id=%s', 'single-activity.php', $activitiesCollection[0]['id'] ?? 1); ?>" class="btn btn-success btn-sm my-2">Explore More &nbsp; <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
                <?php
                shuffle($activitiesCollection);
                foreach ($activitiesCollection as $activity) : ?>
                    <div class="grid-col col-two">
                        <img src="<?php echo $targetPath . "assets/images/activities_db/" .  htmlentities($activity['photo'] ?? 'lake-mburo-zebras.jpg'); ?>" alt="img">
                        <div class="col-text">
                            <h5><?php echo htmlentities($activity['title'] ?? 'Title'); ?></h5>
                            <a href="<?php printf('%s?id=%s', 'single-activity.php', $activity['id'] ?? 1); ?>" class="btn btn-success btn-sm my-2">Explore More &nbsp; <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                <?php endforeach ?>




            </div>
        </div>
    </div>
</section>


<!-----  testimonials section ------->
<section class="testimonials">
    <div class="container">
        <div class="owl-carousel owl-theme owl-testimonial">

            <div class="testimonial-container first">
                <div class="bg-color">
                    <h1>Our travellers <br> love us</h1>
                    <p>take a look at what they say about us</p>
                    <p>Swipe &nbsp; <i class="fas fa-arrows-alt-h"></i> </p>
                </div>
            </div>


            <div class="testimonial-container">
                <img src="./assets/images/testimonials/gayatri.jpg" alt="">
                <div class="testimonial-text">
                    <h4>Tom Powels, Uganda</h4>
                    <p>Lats year i took my last trip with them to butan, which also coincided with my birthady</p>
                </div>
            </div>

            <div class="testimonial-container">
                <img src="./assets/images/testimonials/sahil.jpg" alt="">
                <div class="testimonial-text">
                    <h4>John Smith, Kenya</h4>
                    <p>I was a little appresive about doing the things like Gorilla tracking until i came across this</p>
                </div>
            </div>


            <div class="testimonial-container">
                <img src="./assets/images/testimonials/katya.jpg" alt="">
                <div class="testimonial-text">
                    <h4>Tisha Pryanka, Uganda</h4>
                    <p>All in all the experince was excellent and enjoyed travelling with the minded travels</p>
                </div>
            </div>

            <div class="testimonial-container">
                <img src="./assets/images/testimonials/Surbhi.jpg" alt="">
                <div class="testimonial-text">
                    <h4>Christina Millian, Rwanda</h4>
                    <p>Lats year i took my last trip with them to butan, which also coincided with my birthady</p>
                </div>
            </div>

            <div class="testimonial-container">
                <img src="./assets/images/testimonials/bhavna.jpg" alt="">
                <div class="testimonial-text">
                    <h4>Tom Powels, Uganda</h4>
                    <p>Lats year i took my last trip with them to butan, which also coincided with my birthady</p>
                </div>
            </div>


            <div class="testimonial-container first">
                <div class="bg-color">
                    <h1>Here More from <br>Our customers</h1>
                    <br>
                    <a href="#" class="btn btn-outline-light btn-large">View More Testimonials</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>