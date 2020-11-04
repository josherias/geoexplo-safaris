
<?php
//require the instances file
require_once('./database/Instances.php');

// require all the functions in one file 
include("./functions.inc.php");

if (isset($_POST['pName'])) {

    $title = $_POST['pName'];

    $packageCollection = $package->displaySearch('safaris', $title, 'name');

    if (!empty($packageCollection)) {
        $output = '';
        foreach ($packageCollection as $package) {
            $output .= '
                <tr>
                    <td> <img width="80px" src=' . $targetPath . "assets/images/packages/" . $package['photo'] . '></td>;
                    <td>' . $package['name']  . '</td>
                    <td>' . $package['days']  . '</td>
                    <td>' . $package['price']  . '</td>
                    <td>' . $package['destination']  . '</td>
                    <td>' . $package['publish']  . '</td>
                    <td> 
                        <button data-toggle="modal" class="btn btn-secondary btn-sm m-2 editPackage" data-target="#edit_packages_model" data-id=' . $package['id'] . '>Edit</button>
                        <button class="btn btn-danger btn-sm deletePackage" data-id=' . $package['id'] . '>Delete</button> 
                    </td>
                </tr>
                ';
        }
        echo $output;
    } else {
        echo '<h1 class="text-center my-2">Nothing matches your Search</h1>';
    }
}


if (isset($_POST['aName'])) {

    $title = $_POST['aName'];

    $activityCollection = $activity->displaySearch('activities', $title, 'title');

    if (!empty($activityCollection)) {
        $output = '';
        foreach ($activityCollection as $activity) {
            $output .= '
                <tr>
                    <td> <img width="80px" src=' . $targetPath . "assets/images/activities_db/" . $activity['photo'] . '></td>;
                    <td>' . $activity['title']  . '</td>
                    <td>' . $activity['price']  . '</td>
                    <td>' . $activity['countries']  . '</td>
                    <td>' . substr($activity['short_desc'], 0, 30)  . '</td>

                    <td> 
                        <button data-toggle="modal" class="btn btn-secondary btn-sm m-2 editActivity" data-target="#edit_activity_model" data-id=' . $activity['id'] . '>Edit</button>
                        <button class="btn btn-danger btn-sm deleteActivity" data-id=' . $activity['id'] . '>Delete</button> 

                
                    </td>
                </tr>
                ';
        }
        echo $output;
    } else {
        echo '<h1 class="text-center my-2">Nothing matches your Search</h1>';
    }
}


if (isset($_POST['dName'])) {

    $title = $_POST['dName'];

    $destinationCollection = $destination->displaySearch('destinations', $title, 'title');

    if (!empty($destinationCollection)) {
        $output = '';
        foreach ($destinationCollection as $destinations) {
            $destinationCountry = $destination->displaySingleInstance('countries', $destinations['country_id']);

            $output .= '
                <tr>
                    <td> <img width="80px" src=' . $targetPath . "assets/images/destinations/" . $destinations['image'] . '></td>;
                    <td>' . $destinations['title']  . '</td>
                    <td>' . $destinationCountry[0]['title']  . '</td>
                    <td>' . substr($destinations['description'], 0, 30)  . '</td>

                    <td> 
                        <button data-toggle="modal" class="btn btn-secondary btn-sm m-2 editDestination" data-target="#edit_destination_model" data-id=' . $destinations['id'] . '>Edit</button>
                        <button class="btn btn-danger btn-sm deleteDestination" data-id=' . $destinations['id'] . '>Delete</button> 
                    </td>
                </tr>
                ';
        }
        echo $output;
    } else {
        echo '<h1 class="text-center my-2">Nothing matches your Search</h1>';
    }
}

if (isset($_POST['bName'])) {

    $title = $_POST['bName'];

    $blogCollection = $blog->displaySearch('blog_tb', $title, 'title');

    if (!empty($blogCollection)) {
        $output = '';
        foreach ($blogCollection as $blog) {

            $output .= '
                <tr>
                    <td> <img width="80px" src=' . $targetPath . "assets/images/blog_db/" . $blog['photo'] . '></td>;
                    <td>' . $blog['title']  . '</td>
                    <td>' . $blog['publish']  . '</td>
                    <td>' . $blog['views']  . '</td>
                    <td>' . $blog['date']  . '</td>
                 
                    <td> 
                        <button data-toggle="modal" class="btn btn-secondary btn-sm m-2 editBlog" data-target="#edit_blog_model" data-id=' . $blog['id'] . '>Edit</button>
                        <button class="btn btn-danger btn-sm deleteBlog" data-id=' . $blog['id'] . '>Delete</button> 
                    </td>
                </tr>
                ';
        }
        echo $output;
    } else {
        echo '<h1 class="text-center my-2">Nothing matches your Search</h1>';
    }
}
