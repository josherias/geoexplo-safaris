<?php
session_start();

require_once('./database/Instances.php'); //get all instnaces of classes in one file

require_once('./functions.inc.php'); //get all instnaces of classes in one file


Confirm_Login();

//get all blogs
$blogCollection = $blog->displayCollection('blog_tb');

$categoriesCollection = $blog->displayCollection('categories');

?>


<?php
include_once('./includes/header.inc.php');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="addBlog.php" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">


                            <!-- post title -->
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" class="form-control" placeholder="e.g. The big five in Uganda" name="blogTitle">
                            </div>

                            <!-- post category -->
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="blogCategory">
                                    <?php foreach ($categoriesCollection as $category) : ?>
                                        <option value="<?php echo htmlentities($category['id']); ?>"><?php echo htmlentities($category['title']); ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <!-- post image -->
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="blogImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>


                            <!-- ----published -->
                            <div class="form-group my-5">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="blogPublish">
                                    <label class="custom-control-label" for="customCheck1">Publish to Web</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- post Article -->
                            <div class="form-group">
                                <label for="">Post Article</label>
                                <input id="x" type="hidden" class="form-control" placeholder="" name="blogArticle"></input>
                                <trix-editor input="x"></trix-editor>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="add_blog">
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="edit_blog_model" tabindex="-1" aria-labelledby="edit_blog_model" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form action="editBlog.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-sm-6">

                            <!-- blog id-->
                            <input type="hidden" id="edit_blogId" name="blogId">

                            <!-- post title -->
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" class="form-control" placeholder="e.g. The big five in Uganda" id="edit_blogTitle" name="blogTitle">
                            </div>

                            <!-- post category -->
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" id="edit_blogCategory" name="blogCategory">
                                    <?php foreach ($categoriesCollection as $category) : ?>
                                        <option value="<?php echo htmlentities($category['id']); ?>"><?php echo htmlentities($category['title']); ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <!-- post image -->
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="blogImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <!-- post Article -->
                            <div class="form-group">
                                <label for="">Post Article</label>
                                <input id="x" type="hidden" class="form-control" placeholder="" name="blogArticle"></input>
                                <trix-editor input="x" id="edit_blogArticle"></trix-editor>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Edit" name="edit_blog">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- modal -->

<!-- ------ dasboard ------- -->
<section class="dashboard my-5">
    <div class="container-fluid">

        <?php
        echo SuccessMessage();
        echo ErrorMessage();
        ?>

        <div class="row">


            <div class="col-md-9 my-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Post &nbsp; <i class="fas fa-plus"></i></button>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Blog Posts
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Published</th>
                                    <th>Views</th>
                                    <th>Date created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($blogCollection as $blog) : ?>
                                <tbody>
                                    <tr id="rowHide" data-id="<?php echo $blog['id']; ?>">
                                        <td><img width="80px" src="<?php echo $targetPath . "assets/images/blog/blog_db/" . htmlentities($blog['photo']); ?>" alt="img"></td>
                                        <td><?php echo htmlentities($blog['title']); ?> </td>
                                        <td><?php echo htmlentities($blog['publish'] == 1 ? 'Yes' : 'No'); ?></td>
                                        <td><?php echo htmlentities($blog['views']); ?></td>
                                        <td><?php echo htmlentities($blog['date']); ?></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit_activity_model" data-id="<?php echo $blog['id']; ?>" class="btn btn-secondary btn-sm m-2 editBlog">Edit</button>
                                            <button class="btn btn-danger btn-sm deleteBlog" data-id="<?php echo $blog['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>


<script>
    $(document).ready(function() {

        //edit destination
        $('.editBlog').on('click', function() {
            var id = $(this).data("id");
            console.log(id);


            $.ajax({
                url: "fetchBlog.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let blogData;
                    data.map((data) => {
                        blogData = data;
                        return blogData;
                    });

                    console.log(blogData);

                    $('#edit_blogId').val(blogData.id);
                    $('#edit_blogTitle').val(blogData.title);
                    $('#edit_blogCategory').val(blogData.category);
                    $('#edit_blogArticle').val(blogData.article);



                    $('#edit_blog_model').modal('show');


                }
            });

        });



        //delete activity
        $(".deleteBlog").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "deleteBlog.php",
                type: "GET",
                data: "id=" + id,
                success: function() {
                    console.log("blog deleted");
                }
            });

            $(`#rowHide[data-id='${$(this).data("id")}']`).hide();
        });

    });
</script>