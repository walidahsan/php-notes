<?php
session_start();
include('db.php');

$insert = false;
error_reporting(0);
$usermail = $_SESSION['username'];
$slt = "SELECT * from users where `email` = '$usermail' ";
$r = mysqli_query($conn, $slt);
$userid = mysqli_fetch_array($r);

$loggedid = $userid['userid'];




if (isset($_REQUEST['addnotes'])) {
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['Descrption'];


    $q = "INSERT INTO `notes` ( `title`, `description`, `time`,`userid`) VALUES ( '$title', '$desc', current_timestamp(),'$loggedid') ";
    $res = mysqli_query($conn, $q);
    if ($res) {
        $insert = true;
    } else {
        echo 'not added successfully';
    }
}




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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <?php

                    session_start();
                    $login = $_GET['login'];
                    if (isset($_SESSION['username'])) {

                        echo "<a class='nav-link'  href='logout.php?logout'>logout</a>";
                    } else {
                        header("location:login.php");
                    }
                    ?>

                </li>


            </ul>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<h5 class='text-white'>User : " . $_SESSION['username'] . "</h5>";
            }

            ?>


        </div>
    </nav>
    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Notes Has been added successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>
    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Welcome ' . $_SESSION['username'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>
    <?php
    $update = $_GET['update'];
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Notes Has been updated successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>
    <?php
    $delete = $_GET['deleted'];
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Notes Has been deleted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>


    <div class="container  mt-3">
        <div class="row">



            <div class="col shadow-lg">
                <h1 class="text-primary text-center text-uppercase">Add Notes App</h1>
                <hr class="mb-4" />
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label class="text-primary text-uppercase">title</label>
                        <input name="title" class="form-control rounded" id="title" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="pass">Descrption</label>
                        <textarea type="text" class="form-control rounded" name="Descrption" id="Descrption"></textarea>
                    </div>

                    <button type="submit" value="notes" name="addnotes" class="btn btn-primary  mb-4">add Notes</button>

                </form>

            </div>




        </div>
        <!-- <form action="" method="POST" class="form-inline my-2 my-lg-0">
        </div>

            <input class="form-control  mb-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mb-2 " value="search_submit" name="search_submit" type="submit">Search</button>
        </form>
        <?php
        if (isset($_REQUEST['search_submit'])) {
            $search = $_REQUEST['search'];
            $searql = "SELECT * from `notes` ";
            $ser = mysqli_query($conn, $searql);
        }

        ?> -->

    </div>
    <div class="container mt-4 shadow-lg">
        <h4 class="text-primary text-center text-uppercase">View Your Notes</h4>
        <hr class=" mb-4 " />
        <table class=" table text-center">
            <thead>
                <tr class="text-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col ">Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $usermail = $_SESSION['username'];
                $slt1 = "SELECT * from users where `email` = '$usermail' ";
                $r1 = mysqli_query($conn, $slt1);
                $userid1 = mysqli_fetch_array($r1);

                $loggedid1 = $userid1['userid'];

                $sno = 0;

                $select = "SELECT * from `notes` where `userid`='$loggedid1'";
                $selres = mysqli_query($conn, $select);





                while ($a = mysqli_fetch_assoc($selres)) {
                    $sno = $sno + 1;
                    echo '<tr class="">
                    <th scope="row" class="">' . $sno . '</th>
                    <td>' . $a['title'] . '</td>
                    <td class="">' . $a['description'] . '</td>
                    <td><a class="btn btn-primary" href="update.php?id=' . $a['id'] . "&title=" . $a['title'] . "&desc=" . $a['description'] . "&userid=" . $a['userid'] . '">Edit</a> <a class="btn btn-danger" href="delete.php?id=' . $a['id']  . '">Delete</a></td>
                   
                </tr>';
                }

                ?>



            </tbody>

        </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>