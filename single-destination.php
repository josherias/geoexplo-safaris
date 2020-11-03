<?php require_once('./includes/header.inc.php');
require_once('./webadmin/database/Instances.php');
?>

<?php
$destination_id = $_GET['destination_id'];

$destinationDetails = $destination->displaySingleInstance('destinations', $destination_id);

$destinationDetails = $destinationDetails[0];





?>


<!-----hero activities- --- -->
<section class="hero" style="background: url('<?php echo $targetPath . "assets/images/destinations/" .  htmlentities($destinationDetails['image'] ?? 'lake-mburo-zebras.jpg'); ?>');
    background-size: cover; background-position: center;
    ">
    <div class="hero-background">
        <div class="container">
            <div class="hero-flex">
                <h1><?php echo $destinationDetails['title'] ?? 'title'; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="destination-description">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h5 class="text-center my-3" style="font-size: 2rem;">About Destination</h5>
                <?php echo  $destinationDetails['description'] ?? 'Description'; ?>
            </div>
        </div>
    </div>
</section>



<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>