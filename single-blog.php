<?php

require_once('./webadmin/database/Instances.php');
?>

<?php
$post_id = $_GET['post_id'];

$blogDetails = $blog->displaySingleInstance('blog_tb', $post_id);

$blogDetails = $blogDetails[0];


?>

<?php require_once('./includes/header.inc.php'); ?>

<!-- -----blog section----- -->
<section class="blog my-5 py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 my-3">

                        <div class="card border-0">
                            <img src="<?php echo $targetPath . 'assets/images/blog_db/' . $blogDetails['photo'] ?? '10-reasons-to-visit-uganda-right-in-2019-1549448847.jpg' ?>" class="card-img-top" alt="img">

                            <div class="card-body">
                                <h5 class="blog-text-category"><?php echo $blogDetails['category'] ?? 'ADVENTURE TRAVEL GUIDES'; ?></h5>
                                <h5 class="blog-text-span">Geoxplo - <?php echo $blogDetails['date'] ?? 'March,23, 2020'; ?> </h5>
                                <div class="line m-auto"></div>
                                <h1 class="card-title"> <?php echo $blogDetails['title'] ?? '5 Adventure Travel Movies To Watch During Your Coronavirus Self-Quarantine'; ?> </h1>
                                <p class="card-text text-left"> <?php echo $blogDetails['article'] ?? 'Article'; ?> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- side bar -->
            <div class="col-md-3 my-3">
                <div class="card p-3">
                    <h5 class="card-title text-dark">Subscribe to Our News Letter</h5>
                    <div class="form-group">
                        <input class="form-control rounded-0" placeholder="Email">
                        </input>
                    </div>
                    <button class="btn btn-success my-3 rounded-0">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- footer -->
<?php require_once('./includes/footer.inc.php') ?>