<?php
include('db.php');

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Get and post!</title>
</head>
<style>
    .btn {
        border-radius: 200px !important;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Get/Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">signup</a>
                </li>

            </ul>

        </div>
    </nav>
    <?php


    session_start();
    $logverify = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * from `users` where `email` = '$username' and `password` = '$password'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $_SESSION['username'] = $_POST['email'];
            echo "logged in successfully ";
            header("Location: index.php?user=" . $_SESSION['username'] . "&login=true");
        } else {
            $logverify = true;
        }
    }

    ?>
    <?php

    if ($logverify) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong> check your credentials
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <div class="container ">

        <div class="row mt-4 ">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4 shadow-lg rounded p-4">
                <h4 class="text-primary text-uppercase text-center">Login Here</h4>
                <hr />
                <form class="" method="POST" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </form>
            </div>
            <div class="col-lg-4"></div>


        </div>

    </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>