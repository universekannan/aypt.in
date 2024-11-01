<?php
session_start();
include "timeout.php";
include "config.php";
$page = "dashboard";

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
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 5px" >
                    <center><h4><b>Dashboard</b></h4></center>
                    <br>
                </div>
                <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading top-bar" style="background-color: steelblue;color:white">
                    <div class="col-md-10 col-xs-10">
                        <h3 class="panel-title"  style="text-transform:capitalize;" >New Project:</h3>
                    </div>
                    <div class="col-md-2 col-xs-2 pull-right" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" style="font-size: 20px;text-align: right;color:white" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <?php
                    $date=date("Y-m-d");
                    $sql = "select * from galaxy_project where date='$date'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="row msg_container base_receive">
                                <?php echo $row['project_name']; ?> 
                                <a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank" class="fa fa-edit"></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
                </div>
                <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading top-bar" style="background-color: steelblue;color:white">
                    <div class="col-md-10 col-xs-10">
                        <h3 class="panel-title"  style="text-transform:capitalize;" >Assigned Project</h3>
                    </div>
                    <div class="col-md-2 col-xs-2 pull-right" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" style="font-size: 20px;text-align: right;color:white" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <?php
                    $sql = "select a.id,b.project_name,c.full_name from galaxy_rights a,galaxy_project b,galaxy_users c where
                            a.project_id=b.id and a.user_id=c.id and a.date='$date'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="row msg_container base_receive">
                                    <?php echo $row['project_name']; ?>
                                        <?php echo $row['full_name']; ?> <a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank" class="fa fa-edit"></a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
         </div>
		<div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading top-bar" style="background-color: steelblue;color:white">
                    <div class="col-md-10 col-xs-10">
                        <h3 class="panel-title"  style="text-transform:capitalize;" >Today Follow Up</h3>
                    </div>
                    <div class="col-md-2 col-xs-2 pull-right" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" style="font-size: 20px;text-align: right;color:white" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">

                    <?php
                    $sql = "select * from galaxy_project where follow_up='$date' and trim(latest_update)<>''";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="row msg_container base_receive">
                                <?php echo $row['project_name']; ?>:<?php echo $row['latest_update']; ?> <a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank" class="fa fa-edit"></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
		<div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading top-bar" style="background-color: steelblue;color:white">
                    <div class="col-md-10 col-xs-10">
                        <h3 class="panel-title"  style="text-transform:capitalize;" >My Works</h3>
                    </div>
                    <div class="col-md-2 col-xs-2 pull-right" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" style="font-size: 20px;text-align: right;color:white" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <?php
                    $user_id=$_SESSION['user_id'];
                    $date=date("Y-m-d");
				   $sql = "select * from galaxy_rights where user_id=$user_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="row msg_container base_receive">
                               <td><?php echo $row['work']; ?></td>
							<td><?php echo $row['staff_id']; ?></td>
                                <a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank" class="fa fa-edit"></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            </div>
			</div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>


</html>