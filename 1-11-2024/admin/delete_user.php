<?php
session_start();
include "timeout.php";
include "config.php";
$id=$_GET['id'];

$company_id = $_SESSION['company_id'];
$company_id2=0;
$sql = "SELECT * FROM galaxy_users where id=$id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $company_id2=$row['company_id'];
}
if($company_id!=$company_id2 and $_SESSION['user_type'] != "superadmin"){
    header("location: index.php");
} else{
    $sql = "delete from galaxy_users where id=$id";
    mysqli_query($conn, $sql);
    header("location: users.php");
}

