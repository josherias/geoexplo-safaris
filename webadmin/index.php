<?php
session_start();

require_once('./functions.inc.php');

// if already logged in, login page shouldnt be accesssed
if (isset($_SESSION['username'])) {
    Redirect('dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

</head>

<body>
    <!-- ------ login ------- -->
    <section class="login bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 m-auto" style="min-width: 350px;">

                    <div class="flex" style="display: flex; flex-direction:column; justify-content: center; align-items: center; height: 100vh;">

                        <?php
                        if (@$_GET['Empty'] == true) {
                        ?>
                            <div class="alert alert-danger w-100"><?php echo $_GET['Empty']; ?></div>
                        <?php }; ?>


                        <?php
                        if (@$_GET['Invalid'] == true) {
                        ?>
                            <div class="alert alert-danger w-100"><?php echo $_GET['Invalid']; ?></div>
                        <?php }; ?>


                        <?php
                        if (@$_GET['Login'] == true) {
                        ?>
                            <div class="alert alert-danger w-100"><?php echo $_GET['Login']; ?></div>
                        <?php }; ?>



                        <div class="card  rounded-0 py-4" style="width: 350px;">
                            <h4 class="card-title text-center">Login</h4>
                            <h2 class="card-title text-center text-success">Geoxplo</h2>
                            <div class="card-body">

                                <form action="login.php" method="POST">
                                    <div class="form-group my-4">
                                        <input type="text" class="form-control rounded-0" placeholder="Enter username" name="username" />
                                    </div>
                                    <div class="form-group my-4">
                                        <input type="text" class="form-control rounded-0" placeholder="Enter password" name="password" />
                                    </div>
                                    <input type="submit" value="LOGIN" class="btn btn-outline-success rounded-0 w-100 my-2" name="login">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>