<?php
session_start();

require_once('./database/Instances.php'); //get all instnaces of classes in one file

require_once('./functions.inc.php'); //get all instnaces of classes in one file


Confirm_Login();

//get all packages
$activitiesCollection = $activity->displayCollection('activities');

?>

<!-- header and nav -->
<?php include_once('./includes/header.inc.php'); ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- form -->
                <form method="POST" action="addActivity.php" enctype="multipart/form-data">
                    <div class="row ">
                        <div class="col-sm-6 mx-auto">

                            <!-- activity title -->
                            <div class="form-group">
                                <label for="">Activity Title</label>
                                <input type="text" class="form-control" placeholder="e.g. Mountain Hiking" name="activityTitle">
                            </div>


                            <!-- activity image -->
                            <div class="form-group mt-1">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="activityImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 mx-auto">

                            <!-- activity countries -->
                            <div class="form-group">
                                <label for="">Countries</label>
                                <input type="text" class="form-control" placeholder="e.g. Uganda,Kenya,Tanzania" name="activityCountries">
                            </div>

                            <!-- activity price -->
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" placeholder="e.g. 200" name="activityPrice">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- activity short Description -->
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <textarea type="text" class="form-control" placeholder="" name="activityShortDesc"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">

                            <!-- activity  Description -->
                            <div class="form-group">
                                <label for="">Description</label>
                                <input id="x" type="hidden" class="form-control" placeholder="" name="activityDescription"></input>
                                <trix-editor input="x"></trix-editor>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Save" name="add_activity">

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
<div class="modal fade" id="edit_activity_model" tabindex="-1" aria-labelledby="edit_activity_model" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable">
        <form method="POST" action="editActivity.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- form -->
                    <div class="row ">
                        <div class="col-sm-6 mx-auto">

                            <!-- activity id-->
                            <input type="hidden" id="edit_activityId" name="activityId">

                            <!-- activity title -->
                            <div class="form-group">
                                <label for="">Activity Title</label>
                                <input type="text" class="form-control" placeholder="e.g. Mountain Hiking" id="edit_activityTitle" name="activityTitle">
                            </div>


                            <!-- activity image -->
                            <div class="form-group mt-1">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="activityImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 mx-auto">

                            <!-- activity countries -->
                            <div class="form-group">
                                <label for="">Countries</label>
                                <input type="text" class="form-control" placeholder="e.g. Uganda,Kenya,Tanzania" id="edit_activityCountries" name="activityCountries">
                            </div>

                            <!-- activity price -->
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" placeholder="e.g. 200" id="edit_activityPrice" name="activityPrice">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- activity short Description -->
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <textarea type="text" class="form-control" id="edit_activityShortDesc" name="activityShortDesc"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- activity  Description -->
                            <div class="form-group">
                                <label for="">Description</label>
                                <input id="x" type="hidden" class="form-control" name="activityDescription"></input>
                                <trix-editor input="x" id="edit_activityDescription"></trix-editor>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Edit" name="edit_activity">
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
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add new Activity &nbsp; <i class="fas fa-plus"></i></button>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <input class="form-control" placeholder="Search Title" id="search_activity" name="search_activity"></input>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Activities
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Countries</th>
                                    <th>Short Desc</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody id="result">
                                <?php foreach ($activitiesCollection as $activity) : ?>
                                    <tr id="rowHide" data-id="<?php echo $activity['id']; ?>">
                                        <td><img width="80px" src="<?php echo $targetPath . "assets/images/activities_db/" . $activity['photo']; ?>" alt="img"></td>
                                        <td><?php echo $activity['title']; ?></td>
                                        <td><?php echo "$" . $activity['price']; ?></td>
                                        <td><?php echo $activity['countries']; ?></td>
                                        <td><?php echo htmlentities(substr($activity['short_desc'], 0, 30)) . "..."; ?></td>

                                        <td>
                                            <button data-toggle="modal" data-target="#edit_activity_model" data-id="<?php echo $activity['id']; ?>" class="btn btn-secondary btn-sm m-2 editActivity">Edit</button>
                                            <button class="btn btn-danger btn-sm deleteActivity" data-id="<?php echo $activity['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
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
        $('.editActivity').on('click', function() {
            var id = $(this).data("id");
            console.log(id);


            $.ajax({
                url: "fetchActivity.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let activityData;
                    data.map((data) => {
                        activityData = data;
                        return activityData;
                    });

                    console.log(activityData);


                    $('#edit_activityId').val(activityData.id);
                    $('#edit_activityTitle').val(activityData.title);
                    $('#edit_activityCountries').val(activityData.countries);
                    $('#edit_activityPrice').val(activityData.price);
                    $('#edit_activityShortDesc').val(activityData.short_desc);
                    $('#edit_activityDescription').val(activityData.description);


                    $('#edit_activity_model').modal('show');


                }
            });

        });


        //delete activity
        $(".deleteActivity").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "deleteActivity.php",
                type: "GET",
                data: "id=" + id,
                success: function() {
                    console.log("package deleted");
                }
            });

            $(`#rowHide[data-id='${$(this).data("id")}']`).hide();
        });


        //search
        $('#search_activity').keyup(function() {
            const aName = $(this).val();

            if (aName != '') {
                $.ajax({
                    url: "fetch.php",
                    method: "post",
                    data: {
                        'aName': aName
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                })

            }
        })


    });
</script>