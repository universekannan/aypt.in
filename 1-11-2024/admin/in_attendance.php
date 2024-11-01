<?php
session_start();
$page = "attendance";
include "timeout.php";
include "config.php";
if ($_SESSION['user_type'] != "admin") header("location: index.php");
$date=date("Y-m-d");
$time=date('h:iA');

if (isset($_POST['time_in'])) {
    $date=date("Y-m-d");
    $user_id = $_POST['user_id'];
    $time_in=date('h:iA');
    $stmt = $conn->prepare("INSERT INTO galaxy_attendance (user_id,date,time_in) VALUES (?,?,?)");
    $stmt->bind_param("sss",$user_id,$date,$time);
    $stmt->execute();
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
    <div id="wrapper">
        <?php include "admin-settings.php"; ?>
        <div id="page-wrapper" class="fixed-navbar ">
            <div class="container-fluid bg-gray">
                <div class="row">
                <div class="col-md-12" style="padding-bottom: 5px" >
                    <a href="out_attendance.php" class="btn btn-info fa fa-plus pull-right">&nbsp;
                        <?php if($_SESSION['user_type']=="admin"){ ?>
                            Attendance Time Out
                        <?php } ?>
                    </a>
                    <br>
                </div>
                   <div class="col-md-12">
				<form method="post">
				            <div class="form-group">
                                    <label for="user_id required"
                                           class="control-label">User</label>
                                    <select name="user_id" required="required" class="form-control" >
                                        <option value="">Select</option>
										
                                        <?php
										if($_SESSION['user_type']=="admin"){
                                        $sql = "select * from galaxy_users where status='Active' and user_type='staff' order by full_name";
										
                                         }else if($_SESSION['user_type']=="mm"){
                                        $sql = "select * from galaxy_users where user_type='pm' order by full_name";
										}
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
											
                                            <option value="<?php echo $row['id']; ?>"
                                            ><?php echo $row['full_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                        <div class="form-group text-center">
                                            <input class='btn btn-danger' type='submit' name='time_in' value='Attendance Time In'/>
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