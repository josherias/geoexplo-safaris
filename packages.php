<?php
require_once('./webadmin/database/Instances.php');

$destinationCollection = $destination->displayCollection('destinations');
shuffle($destinationCollection);


$packageCollection = $package->displayCollection('safaris');
shuffle($packageCollection);

?>


<?php require_once('./includes/header.inc.php'); ?>

<!-- -- Hero-Packages- --- -->

<section class="hero">
    <div class="hero-background">
        <div class="container">
            <div class="hero-flex">
                <h1>The most Exciting and Affordable Packages</h1>
                <h5>Explore the availbale safari deals</h5>
            </div>
        </div>
    </div>
</section>

<!-- Packages -->
<section class="packages">
    <div class="container">
        <h1>Safari Packages</h1>
        <h4>Explore a variet of Packages Offered at Gexplo Tours and Travel ! </h4>

        <div class="row">

            <?php foreach ($packageCollection as $package) :  ?>
                <div class="col-md-4">
                    <div class="package-container">
                        <img src="<?php echo $targetPath . "assets/images/packages/" .  htmlentities($package['photo'] ?? 'gorilla-mgahinga.jpg'); ?>" alt="img">
                        <div class="package-text-top">
                            <span>From</span> <span><?php echo "$" . htmlentities($package['price'] ?? 100); ?></span>
                            <br>
                            <span><i class="fas fa-map-marker-alt"></i> &nbsp; <?php
                                                                                $p_destination = $destination->displaySingleInstance('destinations', $package['id']);
                                                                                echo htmlentities($p_destination[0]['title'] ?? 'Masai Mara');
                                                                                ?></span>
                        </div>
                        <div class="package-text">
                            <h5><?php echo htmlentities($package['name'] ?? 'Name'); ?></h5>
                            <a href="<?php echo printf('%s?id=%s', 'packages.php', $package['id'] ?? 1) ?>" class="btn btn-success btn-sm my-2">Explore More &nbsp; <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>
</section>

<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>