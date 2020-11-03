<?php
require_once('./database/Instances.php');


if (!empty($_POST)) {
    $id = $_POST['id'];

    $blogData = $blog->displaySingleInstance('blog_tb', $id);
    echo json_encode($blogData);
}
