<?php
    date_default_timezone_set("Asia/Kolkata");

    $mysql_hostname = "localhost";
    $mysql_user = "galaxy";
    $mysql_password = "Galaxy123$";
    $mysql_database = "hindustandeal";

    $conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

    function fromsqldatedmy($input){
        if($input=="") return "";
        $a=explode('-',$input);
        $y=$a[0];
        $m=$a[1];
        $d=$a[2];
        return($d."/".$m."/".$y);
    }

