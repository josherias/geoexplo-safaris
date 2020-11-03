<?php
session_start();
require_once('./database/Instances.php'); //get all instnaces of classes in one file
require_once('./functions.inc.php'); //get all instnaces of classes in one file


//make page password protected
Confirm_Login();


//get all packages
$packagesCollection = $package->displayCollection('safaris');

//get lodges
$lodgesArray = $package->displayCollection('lodges');

//get destination
$destinationsArray = $package->displayCollection('destinations');


?>



<!-- header and nav -->
<?php include_once('./includes/header.inc.php'); ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a Safari Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form -->
                <form method="POST" action="addPackage.php" enctype="multipart/form-data">
                    <div class="row ">

                        <div class="col-sm-6 mx-auto">

                            <!-- package name -->
                            <div class="form-group">
                                <label for="">Package Name</label>
                                <input type="text" class="form-control" placeholder="e.g. Bwindi impenetrable forest" name="packageName">
                            </div>


                            <!-- package accomodation -->
                            <div class="form-group">
                                <label for="">Accomodation</label>
                                <select class="form-control" name="packageAccomodation">
                                    <?php
                                    foreach ($lodgesArray as $lodge) :
                                    ?>
                                        <option value="<?php echo htmlentities($lodge['id']); ?>"><?php echo htmlentities($lodge['title']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>


                            <!-- package image -->
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="packageImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-5 mx-auto">
                            <!-- package days -->
                            <div class="form-group">
                                <label for="">Number of days</label>
                                <input type="text" class="form-control" placeholder="Two days" name="packageDays">
                            </div>

                            <!-- package price -->
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" placeholder="$200" name="packagePrice">
                            </div>

                            <!-- package country -->
                            <div class="form-group">
                                <label for="">Destination</label>
                                <select class="form-control" name="packageCountry">
                                    <?php foreach ($destinationsArray as $destination) : ?>
                                        <option value="<?php echo htmlentities($destination['id']); ?>"><?php echo htmlentities($destination['title']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- ----published -->
                            <div class="form-group my-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="packagePublish">
                                    <label class="custom-control-label" for="customCheck1">Publish to Web</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- package overview -->
                            <div class="form-group">
                                <label for="">Overview</label>
                                <input id="x" type="hidden" class="form-control" name="packageArticle"></input>
                                <trix-editor input="x"></trix-editor>
                            </div>

                            <!-- submit -->
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary" name="add_package">
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

<!------ edit packages ------>
<div class="modal fade" id="edit_packages_model" tabindex="-1" aria-labelledby="edit_packages_model" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form method="POST" action="editPackage.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <div class="row">

                        <div class="col-sm-6 mx-auto">

                            <!-- package id-->
                            <input type="hidden" id="edit_packageId" name="packageId">

                            <!-- package name -->
                            <div class="form-group">
                                <label for="">Package Name</label>
                                <input type="text" class="form-control" placeholder="e.g. Bwindi impenetrable forest" id="edit_packageName" name="packageName">
                            </div>


                            <!-- package accomodation -->
                            <div class="form-group">
                                <label for="">Accomodation</label>
                                <select class="form-control" id="edit_packageAccomodation" name="packageAccomodation">
                                    <?php
                                    foreach ($lodgesArray as $lodge) :
                                    ?>
                                        <option value="<?php echo htmlentities($lodge['id']); ?>"><?php echo htmlentities($lodge['title']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>


                            <!-- package image -->
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="packageImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-5 mx-auto">
                            <!-- package days -->
                            <div class="form-group">
                                <label for="">Number of days</label>
                                <input type="text" class="form-control" placeholder="Two days" id="edit_packageDays" name="packageDays">
                            </div>

                            <!-- package price -->
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" placeholder="$200" id="edit_packagePrice" name="packagePrice">
                            </div>

                            <!-- package country -->
                            <div class="form-group">
                                <label for="">Destination</label>
                                <select class="form-control" id="edit_packageCountry" name="packageCountry">
                                    <?php foreach ($destinationsArray as $destination) : ?>
                                        <option value="<?php echo htmlentities($destination['id']); ?>"><?php echo htmlentities($destination['title']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <!-- package overview -->
                            <div class="form-group">
                                <label for="">Overview</label>
                                <input id="x" type="hidden" class="form-control" name="packageArticle"></input>
                                <trix-editor input="x" id="edit_packageArticle"></trix-editor>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Edit" class="btn btn-primary" name="edit_package">
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
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Safari &nbsp; <i class="fas fa-plus"></i></button>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Safaris
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Days</th>
                                    <th>Price</th>
                                    <th>Destination</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($packagesCollection as $package) :
                            ?>
                                <tbody>
                                    <tr id="rowHide" data-id="<?php echo $package['id']; ?>">
                                        <td><img width="80px" src="<?php echo $targetPath . "assets/images/packages/" . htmlentities($package['photo']); ?>" alt="img"></td>
                                        <td><?php echo htmlentities($package['name']); ?></td>
                                        <td><?php echo htmlentities($package['days']); ?></td>
                                        <td><?php echo htmlentities($package['price']); ?></td>
                                        <td><?php echo htmlentities($package['destination']); ?></td>
                                        <td><?php echo $package['publish']  ? 'Yes' : 'No'; ?></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit_packages_model" data-id="<?php echo $package['id']; ?>" class="btn btn-secondary btn-sm m-2 editPackage">Edit</button>
                                            <button class="btn btn-danger btn-sm deletePackage" data-id="<?php echo $package['id']; ?>">Delete</button>
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

        //edit package
        $('.editPackage').on('click', function() {
            var id = $(this).data("id");
            console.log(id);

            $.ajax({
                url: "fetchPackage.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let packageData;
                    data.map((data) => {
                        packageData = data;
                        return packageData;
                    });

                    $('#edit_packageId').val(packageData.id);
                    $('#edit_packageName').val(packageData.name);
                    $('#edit_packageAccomodation').val(packageData.lodge_id);
                    $('#edit_packageDays').val(packageData.days);
                    $('#edit_packagePrice').val(packageData.price);
                    $('#edit_packageCountry').val(packageData.destination);
                    $('#edit_packageArticle').val(packageData.overview);

                    $('#edit_package_model').modal('show');


                }
            });

        });

        //delete package
        $(".deletePackage").click(function() {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "deletePackage.php",
                type: "GET",
                data: "id=" + id,
                success: function() {
                    console.log("package deleted");
                }
            });

            $(`#rowHide[data-id='${$(this).data("id")}']`).hide();
        });

    });
</script>