<?php
session_start();
include "timeout.php";
include "config.php";
$page = "exbanse";
$user_id=$_SESSION['user_id'];
$msg = "";
$msg_color = "";
$exbanse_amound = "";
$resen = "";
$status = "";
$date = date("Y-m-d");

if (isset($_POST['submit'])) {
    $exbanse_amound = $_POST['exbanse_amound'];
    $resen = $_POST['resen'];
    $status = $_POST['status'];

    $msg_color = "green";
    $msg = "Project added successfully";
    $stmt = $conn->prepare("INSERT INTO galaxy_exbanse (exbanse_amound,resen,status,user_id,date) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $exbanse_amound,$resen, $status,$user_id,$date);
    $stmt->execute();
	
    header("location: exbanse.php");

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

    <?php include "header.php"; ?>
</head>

<body>

<div id="wrapper">
    <?php include "settings.php"; ?>
    <div id="page-wrapper" class="fixed-navbar ">
        <div class="container-fluid bg-gray">
            <div class="row" style="margin:0;">
                <div class="col-md-12">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading text-center">
                            <b>Add Exbanse</b>
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="resen required"
                                                   class="control-label">Resen</label>
                                            <input value="<?php echo $resen; ?>" type="text"
                                                   maxlength="50"
                                                   name="resen" id="resen" class="form-control"
                                                   placeholder="Resen">
                                        </div>
                                        <div class="form-group">
                                            <label for="exbanse_amound"
                                                   class="control-label">Exbanse Amound</label>
                                            <input value="<?php echo $exbanse_amound; ?>" type="number"
                                                   maxlength="50"
                                                   name="exbanse_amound" id="exbanse_amound" class="form-control"
                                                   placeholder="Exbanse Amound">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="status" class="control-label required">Status</label>
                                            <select name="status" id="status" class="form-control">
											<?php if($_SESSION['user_type']=="admin"){ ?>
                                                 <option <?php if ($status == "Active") echo " selected='selected'"; ?>
                                                    value="Active">Active
                                                </option>
											<?php } ?>
                                                <option <?php if ($status == "Inactive") echo " selected='selected'"; ?>
                                                    value="Inactive">Inactive
                                                </option>
                                            </select>
                                        </div>
                                <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info"
                                           type="submit"
                                           name="submit" value="Save"/>
                                    <a href="project.php" class="btn btn-info">Back</a>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include "footer.php"; ?>

</body>


</html>