<?php
require_once('./webadmin/database/Instances.php');

$destinationCollection = $destination->displayCollectionLimit('destinations', 8);
shuffle($destinationCollection);

$activitiesCollection = $activity->displayCollectionLimit('activities', 10);



$packageCollection = $package->displayCollectionLimit('safaris', 8);

shuffle($packageCollection);


?>

<?php require_once('./includes/header.inc.php'); ?>

<!-- ----- slider ------- -->
<section class="slider">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="./assets//images/slide/gorilla-uga.jpg" class="d-block w-100" id="img-carousel" alt="...">
                <div class="carousel-caption ">
                    <h1>VISIT BWINDI IMPENETRABLE</h1>
                    <div class="underlin"></div>
                    <h5>Gorilla Tracking Expeiences</h5>
                </div>
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="./assets//images/slide/mountain.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h1>VISIT MAHINGA PARK</h1>
                    <div class="underlin"></div>
                    <h5>Home of the remaining red hat Monkeys</h5>
                    <button class="btn btn-warning btn-lg btn-book" style="color: white;">Book a Safari &nbsp; <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="./assets//images/slide/rwanda2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h1>VISIT BUNDIBUJO MOUNTAINS</h1>
                    <div class="underlin"></div>
                    <h5>View of the best Senaries to watch with loved ones</h5>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- destinations -->
<section class="destinations-section">
    <div class="container">
        <h1>TRAVEL DESTINATIONS</h1>
        <h4>Visit your dream destination !</h4>

        <div class="row">
            <?php foreach ($destinationCollection as $destinations) : ?>
                <div class="col-sm-3 padding-0 destination">
                    <a href="<?php printf('%s?destination_id=%s', 'single-destination.php', $destinations['id'] ?? 1); ?>">
                        <img src="<?php echo $targetPath . "assets/images/destinations/" . htmlentities($destinations['image'] ?? 'lake-bunyonyi'); ?>" alt="img">
                        <h5 class="destination-text"><?php $destinationCountry = $destination->displaySingleInstance('countries', $destinations['country_id']);
                                                        echo htmlentities($destinationCountry[0]['title'] ?? 'Title'); ?></h5>
                    </a>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>

<!-- Trending Activities -->
<section class="activities">
    <div class="container">
        <h2>Trending Activities</h2>
        <p>From adventure trips to luxury camping. From epic train journeys to amazing wildlife sightings. <br>
            These are the trips and destinations that are making travellers smile.</p>

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

<!----- countings ------->
<section class="countings">
    <div class="container">
        <div class="row-row">
            <div class="col">
                <div class="round-wrapper">
                    <h1>30+</h1>
                    <p>Years In Business</p>
                </div>
            </div>
            <div class="col">
                <div class="round-wrapper">
                    <h1>200+</h1>
                    <p>Destinations</p>
                </div>
            </div>
            <div class="col">
                <div class="round-wrapper">
                    <h1>1000+</h1>
                    <p>Packages</p>
                </div>
            </div>
            <div class="col">
                <div class="round-wrapper">
                    <h1>100+</h1>
                    <p>Countries</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!----- packages slider ------->
<section class="packages-slider">
    <div class="container">
        <h1>Find Your Adventure</h1>
        <h4>Check out the top safari Packages</h4>
        <div class="owl-carousel owl-theme owl-package">

            <?php foreach ($packageCollection as $package) :  ?>
                <div class="package-container">
                    <img src="<?php echo $targetPath . "assets/images/packages/" .  htmlentities($package['photo'] ?? 'gorilla-mgahinga.jpg'); ?>" alt="img">
                    <div class="package-text-top">
                        <span>From</span> <span><?php echo "$" . htmlentities($package['price'] ?? 100); ?></span>
                        <br>
                        <span><i class="fas fa-map-marker-alt"></i> &nbsp; <?php
                                                                            $p_destination = $destination->displaySingleInstance('destinations', $package['id']);
                                                                            echo htmlentities($p_destination[0]['title'] ?? 'Title');
                                                                            ?></span>
                    </div>
                    <div class="package-text">
                        <h5><?php echo htmlentities($package['name'] ?? 'Name'); ?></h5>
                        <a href="<?php echo printf('%s?id=%s', 'packages.php', $package['id'] ?? 1) ?>" class="btn btn-success btn-sm my-2">Explore More &nbsp; <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>

<!----- about section ------->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 m-auto text-center">
                <h1>Geoxplo Tours and Travels</h1>

                <p>We organize safaris for solo travelers, small and big groups, families, couples
                    traveling for wildlife, culture, photography, birding, primates, adventure, name it. Our team of experts is always ready to plan your journey to Africa’s rich and diverse wildlife,
                    cultural heritage and beautiful landscapes.</p>

                <a href="about.php" class="btn btn-outline-light btn-large">More About Us</a>
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