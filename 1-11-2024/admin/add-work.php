<?php
session_start();
$page = "project";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "pm") && ($_SESSION['user_type'] != "mm")) header("location: index.php");
$id = $_GET['id'];
$msg = "";
$msg_color = "";
$project_id="";
$date = date("Y-m-d");
$work_details = "";
$user_id = "";

if (isset($_POST['submit'])) {

    $date = trim($_POST['date']);
    $project_id = trim($_POST['project_id']);
    $work_details = $_POST['work_details'];
	$user_id = trim($_POST['user_id']);	
	
		 $stmt = $conn->prepare("INSERT INTO galaxy_work(date,work_details,project_id,user_id) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$date,$work_details,$project_id=$id,$user_id);
        $stmt->execute()or die($stmt->error);
        $id=$stmt->insert_id;


        header("location: project.php");
    }


$sql = "select * from galaxy_project where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
    <div id="wrapper">
        <?php include "settings.php"; ?>
        <div id="page-wrapper" class="fixed-navbar ">
            <div class="container-fluid bg-gray">
				<div class="row">
                   <div class="col-md-12">
				        <div class="panel-heading text-center">
                            <b>Add Work</b>
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                        </div>
					 <form method="post" action="" enctype="multipart/form-data">
                        <div class="login-panel panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
	                                    <div class="form-group">
                                            <label for="work_etails" class="control-label">Work Details</label>
										<input value="<?php echo $work_details; ?>" type="text"   
                                        name="work_details" id="work_details" class="form-control" placeholder="Work Details">
                                            </div>
											
                                            <div class="form-group text-center">
                                                <input required="required" class="btn btn-info"
                                                       type="submit"
                                                       name="submit" value="Add Work"/>
                                                <a href="ec.php" class="btn btn-info">Back</a>                                           </div>
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