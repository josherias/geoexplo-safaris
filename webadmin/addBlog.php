<?php
session_start();
//require the instances file
require_once('./database/Instances.php');
// require all the functions in one file 
include("./functions.inc.php");


if (!empty($_POST) &&  isset($_POST['add_blog'])) {

    $blogTitle          = $_POST['blogTitle'];
    $blogCategory  = $_POST['blogCategory'];
    $blogPublish       = $_POST['blogPublish'];
    $blogArticle       = $_POST['blogArticle'];

    $blogDate = date("Y/m/d");


    $blogImage     = $_FILES['blogImage']['name'];
    $target_path = "../assets/images/blog_db" . basename($_FILES['blogImage']['name']);


    move_uploaded_file($_FILES['blogImage']['tmp_name'], $target_path);


    $blogPublish == 'on' ? $blogPublish = 1 : $blogPublish = 0;

    //store the form data in array
    $data = [
        'blogTitle' => $blogTitle,
        'blogCategory' => $blogCategory,
        'blogPublish' => $blogPublish,
        'blogArticle' => $blogArticle,
        'blogImage' => $blogImage,
        'blogDate' => $blogDate,
    ];

    //add blog to database
    $blog->addblog($data);

    $_SESSION['SuccessMessage'] = "Blog added successfully";


    Redirect('blog.php');
} else {

    $_SESSION['ErrorMessage'] = "Failed to add blog to database";

    Redirect('blog.php');
}
