<?php
session_start();

require_once('./database/Instances.php'); //get all instnaces of classes in one file
require_once('./functions.inc.php'); //get all instnaces of classes in one file

//make page password protected
Confirm_Login();

$packageItems = $package->displayCollection('safaris');
$packageCount = $package->instanceCount($packageItems);

$activityItems = $package->displayCollection('activities');
$activityCount = $package->instanceCount($activityItems);

$destinationItems = $package->displayCollection('destinations');
$destinationCount = $package->instanceCount($destinationItems);

$blogItems = $package->displayCollection('blog_tb');
$blogCount = $package->instanceCount($blogItems);



?>

<!-- header and nav -->
<?php include_once('./includes/header.inc.php'); ?>


<!-- ------ dasboard ------- -->
<section class="dashboard my-5">
    <div class="container-fluid">
        <?php
        echo SuccessMessage();
        echo ErrorMessage();
        ?>
        <div class="row">
            <div class="col-md-3 my-3">
                <div class="card bg-success p-3 text-light">
                    <h3 class="card-title">Packages <br> <i class="fas fa-box-open"></i></h3>
                    <h2><?php echo htmlentities($packageCount); ?></h2>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="card bg-primary p-3 text-light">
                    <h3 class="card-title">Activities <br> <i class="fas fa-skiing-nordic"></i> </h3>
                    <h2><?php echo htmlentities($activityCount); ?></h2>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="card bg-warning p-3 text-light">
                    <h3 class="card-title">Destinations <br> <i class="fas fa-plane"></i></h3>
                    <h2><?php echo htmlentities($destinationCount); ?></h2>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="card bg-secondary p-3 text-light">
                    <h3 class="card-title">Blogs <br> <i class="fas fa-rss-square"></i></h3>
                    <h2><?php echo htmlentities($blogCount); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>