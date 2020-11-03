<?php
require_once('./webadmin/database/Instances.php');

$destinationCollection = $destination->displayCollectionLimit('destinations', 8);
shuffle($destinationCollection);

$blogCollection = $blog->displayCollection('blog_tb');


?>

<?php require_once('./includes/header.inc.php'); ?>


<!-- -----blog section----- -->
<section class="blog my-5 py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    <div class="col-md-12 my-3">
                        <a href="single-blog.php?post_id=<?php echo $blogCollection[0]['id']; ?>">
                            <div class="card">
                                <img src="<?php echo $targetPath . 'assets/images/blog_db/' . $blogCollection[0]['photo'] ?? './assets/images/blog_db/travel+leisure-named-kenya-and-rwanda-among-the-50-best-places-to-travel-in-2019.jpg'; ?>" class="card-img-top blog-img" alt="img">
                                <div class="card-body">
                                    <h5 class="blog-text-category"><?php echo $blogCollection[0]['category'] ?? 'ADVENTURE TRAVEL GUIDES' ?></h5>
                                    <h5 class="blog-text-span">Geoxplo - <?php echo $blogCollection[0]['date'] ?? '10-03-2020' ?></h5>
                                    <div class="line m-auto"></div>
                                    <h1 class="card-title"><?php echo $blogCollection[0]['title'] ?? 'ADVENTURE TRAVEL GUIDES TITLE' ?></h1>
                                    <p class="card-text"> <?php echo substr($blogCollection[0]['article'], 400, 200) ?? 'ADVENTURE TRAVEL GUIDES TITLE' ?> </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php foreach ($blogCollection as $blog) : ?>
                        <div class="col-sm-6 my-3">
                            <a href="single-blog.php?post_id=<?php echo $blog['id']; ?>">
                                <div class="card">
                                    <img src="<?php echo $targetPath . 'assets/images/blog_db/' . $blog['photo'] ?? './assets/images/blog_db/10-reasons-to-visit-uganda-right-in-2019-1549448847.jpg' ?>" class="card-img-top blog-img" alt="img" />

                                    <div class="card-body">
                                        <h5 class="blog-text-category"><?php echo $blog['category'] ?? 'ADVENTURE TRAVEL GUIDES'; ?></h5>
                                        <h5 class="blog-text-span">Geoxplo - <?php echo $blog['date'] ?? '10-03-2020' ?></h5>
                                        <div class="line m-auto"></div>
                                        <h1 class="card-title"><?php echo $blog['title'] ?? 'ADVENTURE TRAVEL GUIDES TITLE' ?></h1>
                                        <p class="card-text">

                                            <?php echo htmlentities(substr($blog['article'], 200, 200) ?? 'ADVENTURE TRAVEL GUIDES TITLE') ?>

                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>



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