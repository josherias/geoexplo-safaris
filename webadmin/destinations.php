<?php
session_start();

require_once('./database/Instances.php'); //get all instnaces of classes in one file
require_once('./functions.inc.php'); //get all instnaces of classes in one file

//make page password protected
Confirm_Login();


//get all packages
$destinationsCollection = $destination->displayCollection('destinations');
//get all countries
$countriesCollection = $destination->displayCollection('countries');

?>


<?php
include_once('./includes/header.inc.php');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="addDestination.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">

                            <!-- destination title-->
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="e.g. Nyungwe National forest Park" name="destinationTitle">
                            </div>


                            <!-- upload image-->
                            <div class="form-group my-4">
                                <label for="">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="destinationImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                            <!-- select country -->
                            <div class="form-group">
                                <label for="">Country</label>
                                <select class="form-control" name="destinationCountry">
                                    <?php foreach ($countriesCollection as $country) : ?>
                                        <option value="<?php echo htmlentities($country['id']); ?>"><?php echo htmlentities($country['title']); ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <!-- activity short Description -->
                            <div class="form-group">
                                <label for="">Description</label>
                                <input id="x" type="hidden" class="form-control" placeholder="" name="destinationDescription"></input>
                                <trix-editor input="x"></trix-editor>
                            </div>
                        </div>

                        <div class="col-sm-12 my-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="add_destination">
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


<!-- edit destination modal -->
<div class="modal fade" id="edit_destination_model" tabindex="-1" aria-labelledby="edit_destination_mode" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form method="POST" action="editDestination.php" enctype="multipart/form-data" id="edit_destination">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Destination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 mx-auto">

                            <!-- destination id-->
                            <input type="hidden" id="edit_destinationId" name="destinationId">

                            <!-- destination title-->
                            <div class="form-group">
                                <label for="">Title</label>

                                <input type="text" class="form-control" placeholder="e.g. Nyungwe National forest Park" id="edit_destinationTitle" name="destinationTitle">
                            </div>


                            <!-- upload image-->
                            <div class="form-group my-4">
                                <label for="">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="destinationImage">
                                    <label class="custom-file-label" for="customFile" id="edit_destinationImage">Choose file</label>
                                </div>
                            </div>

                            <!-- select country -->
                            <div class="form-group">
                                <label for="">Country</label>
                                <select class="form-control" name="destinationCountry" id="edit_destinationCountry">
                                    <?php foreach ($countriesCollection as $country) : ?>
                                        <option value="<?php echo htmlentities($country['id']); ?>"><?php echo htmlentities($country['title']); ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <!-- destination Description -->
                            <div class="form-group">
                                <label for="">Description</label>
                                <input id="x" type="hidden" class="form-control" name="destinationDescription"></input>
                                <trix-editor input="x" id="edit_destinationDescription"></trix-editor>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Edit" name="edit_destination">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </form>
    </div>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Destination &nbsp; <i class="fas fa-plus"></i></button>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Destinations
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Country</th>
                                    <th>description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php

                            foreach ($destinationsCollection as $destinations) : ?>
                                <tbody>
                                    <tr id="rowHide" data-id="<?php echo $destinations['id']; ?>">
                                        <td><img width="80px" src="<?php echo $targetPath . "assets/images/destinations/" . htmlentities($destinations['image']); ?>" alt="img"></td>
                                        <td><?php echo htmlentities($destinations['title']); ?></td>
                                        <td><?php $destinationCountry = $destination->displaySingleInstance('countries', $destinations['country_id']);
                                            echo htmlentities($destinationCountry[0]['title']); ?>
                                        </td>
                                        <td><?php echo htmlentities(substr($destinations['description'], 3, 30) . "..."); ?></td>


                                        <td>
                                            <button class="btn btn-secondary btn-sm m-2 editDestination" data-id="<?php echo $destinations['id']; ?>" data-toggle="modal" data-target="#edit_destination_model">Edit</button>
                                            <button class="btn btn-danger btn-sm deleteDestination" data-id="<?php echo $destinations['id']; ?>">Delete</button>
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
        $('.editDestination').on('click', function() {
            var id = $(this).data("id");
            console.log(id);


            $.ajax({
                url: "fetchDestination.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let destinationData;
                    data.map((data) => {
                        destinationData = data;
                        return destinationData;
                    });

                    console.log(destinationData);


                    $('#edit_destinationId').val(destinationData.id);
                    $('#edit_destinationTitle').val(destinationData.title);
                    $('#edit_destinationImage').val(destinationData.image);
                    $('#edit_destinationCountry').val(destinationData.country_id);
                    $('#edit_destinationDescription').val(destinationData.description);

                    $('#edit_destination_model').modal('show');

                }
            });

        });



        //delete activity
        $(".deleteDestination").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "deleteDestination.php",
                type: "GET",
                data: "id=" + id,
                success: function() {
                    console.log("destination deleted");
                }
            });

            $(`#rowHide[data-id='${$(this).data("id")}']`).hide();
        });

    });
</script>