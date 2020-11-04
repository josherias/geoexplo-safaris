<?php
session_start();
//require the instances file
require_once('./database/Instances.php');
// require all the functions in one file 
include("./functions.inc.php");



if (!empty($_POST) &&  isset($_POST['edit_blog'])) {

    $id  = $_POST['blogId'];

    $blogTitle         = $_POST['blogTitle'];
    $blogCategory  = $_POST['blogCategory'];
    $blogArticle  = $_POST['blogArticle'];

    $blogImage  = $_FILES['blogImage']['name'];
    $target_path = "../assets/images/blog_db/" . basename($_FILES['blogImage']['name']);
    move_uploaded_file($_FILES['blogImage']['tmp_name'], $target_path);

    //store the form data in array
    $data = [
        'blogTitle' => $blogTitle,
        'blogCategory' => $blogCategory,
        'blogArticle' => $blogArticle,
        'blogImage' => $blogImage
    ];


    $blog->editBlog($data, $id);

    $_SESSION['SuccessMessage'] = "blog edited successfully";

    Redirect('blog.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to edit blog";

    Redirect('blog.php');
}
