<?php
session_start();
include "timeout.php";
include "config.php";
if ($_SESSION['user_type'] != "superadmin") header("location: index.php");
$id=$_GET['id'];
$sql = "delete from galaxy_category where id=$id";
mysqli_query($conn, $sql);
header("location: category.php");


