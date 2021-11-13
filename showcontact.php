<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('db.php');

    $q = "SELECT * from `customers`";
    $res = mysqli_query($conn, $q);
    $num = mysqli_num_rows($res);
    echo '<br/>' . $num;

    while ($a = mysqli_fetch_assoc($res)) {
        echo "<br/>" . $a['id']  . $a['name'] . "   " . $a['description'] . "<br/>";
    }

    $sql = "UPDATE `customers` SET  `name` = 'asdkas' where `id` = '1'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "updated successfully";
    } else {
        echo "not updated Successfully" . mysqli_error($conn);
    }

    ?>

</body>

</html>