<?php
include('db.php');

$id = $_GET['id'];
$title = $_GET['title'];
$desc = $_GET['desc'];
$update = false;



?>
<?php
if (isset($_REQUEST['submit'])) {
    $newid = $_POST['id'];
    $newtitle = $_POST['title'];
    $newdesc = $_POST['desc'];
    $sql = "UPDATE notes SET id='$newid',title='$newtitle',`description` = '$newdesc' WHERE id='$newid'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $update = true;
        header('location:index.php?update=true');
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

                    if (isset($_SESSION['username'])) {

                        echo "<a class='nav-link'  href='logout.php?logout'>logout</a>";
                    } else {
                        header("location:login.php");
                    }
                    ?>

                </li>


        </div>
        <?php

        if (isset($_SESSION['username'])) {
            echo "<h5 class='text-white'>User : " . $_SESSION['username'] . "</h5>";
        }

        ?>
    </nav>


    <div class="container mt-3">
        <div class="row">

            <div class="col-lg-4">

            </div>

            <div class="col-lg-4 shadow-lg">

                <h1 class="text-primary text-uppercase text-center">update Notes </h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="text-primary text-uppercase">id</label>
                        <input name="id" class="form-control" value="<?php echo $id ?>" id="id" aria-describedby="emailHelp">
                        <label class="text-primary text-uppercase">title</label>
                        <input name="title" class="form-control" value="<?php echo $title ?>" id="title" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="pass">Descrption</label>
                        <input type="text" class="form-control" value="<?php echo $desc ?>" name="desc" id="desc"></input>
                    </div>
                    <div class="mb-4">

                        <button type="submit" name="submit" class="btn btn-primary">update Notes</button>
                        <a href="/phpPractice/index.php" class="btn btn-danger">Go Back</a>
                    </div>
                </form>

            </div>
            <div class="col-lg-4">

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