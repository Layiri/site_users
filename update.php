<?php

include_once 'config/config.php';
include_once 'helpers/Database.php';
include_once 'models/User.php';

$conn = Database::connectDatabase($config);
$users = new User($conn);
if ($_GET['id']) {
    $id = $_GET['id'];
    $user = $users->one($id);
} else {
    header("Location: index.php");
    exit();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Create new user </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='ressources/css/app.css' rel='stylesheet' type='text/css'>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">My Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <h2>
                Create new user
            </h2>
            <form id="id_landing-form" class="needs-validation" method="post"
                  onsubmit="return validateForm();"
                  action="controller/update.php" role="form">
                <div class="messages"></div>

                <div class="controls">
                    <input id="id_user" type="hidden" name="id_user" required="required" value="<?= $user['id']?>">

                    <div class="col">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_name">Full Name *</label>
                                <input id="id_form_name" type="text" name="name" class="form-control"
                                       placeholder="Please enter your full name" required="required"
                                       data-error="Full name is required." value="<?= $user['name']?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="id_form_email" type="email" name="email" class="form-control"
                                       placeholder="Please enter your email" required="required"
                                       data-error="Valid email is required." value="<?= $user['email']?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_tel">Telephone *</label>
                                <input id="id_form_tel" type="text" name="form_tel" class="form-control"
                                       placeholder="Please enter your phone number" required="required"
                                       data-error="Valid telephon is required."
                                       onkeypress="return event.charCode !== 32" value="<?= $user['phone']?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-send" value="Save">
                    <p class="text-muted">
                        <strong>*</strong> These fields are required.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Layiri 2021</p>
    </div>
    <!-- /.container -->
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="ressources/js/validator.js"></script>
<script src="ressources/js/app.js"></script>

</body>

</html>
