<?php
session_start();
include('db.php');
$usermail = $_SESSION['username'];
$slt1 = "SELECT * from users where `email` = '$usermail' ";
$r1 = mysqli_query($conn, $slt1);
$userid1 = mysqli_fetch_array($r1);

$loggedid1 = $userid1['userid'];


$id = $_GET['id'];
$q = "DELETE FROM `notes` WHERE `notes`.`id` ='$id' ";
$res = mysqli_query($conn, $q);
if ($res) {
    header("Location: index.php?deleted=true&id=" . $id . "");
} else {
    echo "record not deleted successfully";
}
