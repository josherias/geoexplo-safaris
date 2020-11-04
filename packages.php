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
        <p class="text-dark text-center" style="font-size: 1.2rem;">Explore a variet of Packages Offered at Gexplo Tours and Travel ! </p>

        <div class="row">

            <?php foreach ($packageCollection as $package) :  ?>
                <div class="col-md-6">
                    <div class="package-container">
                        <img src="<?php echo $targetPath . "assets/images/packages/" .  htmlentities($package['photo'] ?? 'gorilla-mgahinga.jpg'); ?>" class="rounded-0" alt="img">
                        <div class="package-text-top">
                            <span>From</span> <span><?php echo "$" . htmlentities($package['price'] ?? 100); ?></span>
                            <br>
                            <span><i class="fas fa-map-marker-alt"></i> &nbsp; <?php
                                                                                $p_destination = $destination->displaySingleInstance('destinations', $package['id']);
                                                                                echo htmlentities($p_destination[0]['title'] ?? 'Masai Mara');
                                                                                ?></span>
                        </div>
                        <div class="package-text">
                            <h5><?php echo htmlentities($package['name'] ?? 'Name');
                                ?></h5>
                        </div>

                    </div>
                    <div class="package-footer p-4 w-100 " style="margin-top: -32px; background-color:white; font-size:large; letter-spacing:1px">
                        <?php echo $package['overview']; ?>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>
</section>

<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>