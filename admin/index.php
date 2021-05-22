<?php
session_start();
include "config.php";
$error = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM galaxy_users WHERE email='$email' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count >= 1) {
        $_SESSION['timestamp'] = time();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['company_id'] = $row['company_id'];
        if($row['user_type']=="superadmin" )
            header("location: users.php");
        else
            header("location: project.php");
    } else {
        $error = "Your User Name or Password is invalid";
    }
}
?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"/>

    <title>GTP</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/styles/default.css" type="text/css" rel="stylesheet" id="style_color"/>


</head>

<body>


<div style="padding-top:10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    Please Login<br>
                    <span style="color: red;text-align: center"><?php echo $error; ?></span>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="control-label">User Name</label>
                                <input class="form-control" maxlength="50" placeholder="User Name" name="email" type="text"
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input class="form-control" maxlength="50" placeholder="Password" name="password"
                                       type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-outline btn-info btn-block" type="submit"
                                       name="submit" value="Login"/>
                            </div>
                        </fieldset>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>


</html>
