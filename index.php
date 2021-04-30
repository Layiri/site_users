<?php
include_once 'config/config.php';
include_once 'helpers/Database.php';
include_once 'models/User.php';

$conn = Database::connectDatabase($config);
$user = new User($conn);
$users = $user->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Site</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Create</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mx-auto ">
    <table class="table table-striped table-bordered" data-toggle="table" data-pagination="true"
           data-search="true">
        <thead>
        <tr>
            <th data-sortable="true" data-field="id" scope="col">ID</th>
            <th data-sortable="true" data-field="name" scope="col">Full name</th>
            <th data-sortable="true" data-field="email" scope="col">Email</th>
            <th data-sortable="true" data-field="phone" scope="col">Phone</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user->id ?></th>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->phone ?></td>
                <td class="action_table">

                    <a title="Update" class="btn btn-small btn-success"
                       href="update.php?id=<?= $user->id ?>"><i class="fa fa-edit"></i>
                    </a>
                    <a title="" class="btn btn-small btn-danger"
                       href="controller/delete.php?id=<?= $user->id ?>"><i
                                class="fa fa-trash"></i> </a>

                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Layiri 2021</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

<script src="ressources/js/validator.js"></script>
<script src="ressources/js/app.js"></script>

</body>
</html>
