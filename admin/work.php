<?php
session_start();
$page = "ec";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "pm") && ($_SESSION['user_type'] != "mm")) header("location: index.php");
$id=$_GET['id'];	

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
			   				<?php
						$sql2 = "select * from galaxy_project where id=$id";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                    <a href="assign.php?id=<?php echo $row2['id']; ?>" class="btn btn-info fa fa-plus pull-right">&nbsp;Add Work</a>
                    <br>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTables-example">
                        <thead>
						<tr style="background-color: steelblue;color:white">
                            <th style="text-align: center" colspan="12"><?php echo $row2['project_name']; ?></th>	
							<?php } ?>

                        </tr>
                        <tr style="background-color: #81888c;color:white" >
                        <th width="50px" style="text-align:right">Date</th>
                        <th>Work</th>
                        <th width="100px" style="text-align:right">To User</th>
                        <th width="50px" style="text-align:right">Delete</th>
                           
                            
                            <!--<th width="50px" style="text-align:right">View</th>
                            <th width="50px" style="text-align:right">Edit</th>
                            <th width="50px" style="text-align:right">Delete</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                       
                        function can_delete($id)
                        {
                            $flag = true;
                            $sql = "select * from ec where id=$id";
                            $result = mysqli_query($GLOBALS['conn'], $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $flag = false;
                            }
                            return $flag;
                        }
                   //$sql = "select a.*,b.full_name from ec a,users b where a.name=b.id and a.ec_id=id";
				   //$sql = "SELECT a.*,b.description as jtype FROM jobs a,job_type b WHERE a.job_type1_id=b.id and a.id=$id";
				  // $sql = "select * from galaxy_rights where project_id=$id";
				 $sql = "select a.*,b.full_name from galaxy_rights a,galaxy_users b where a.project_id=$id and a.user_id=b.id";
				 // $sql = "select * from galaxy_rights where project_id=$id";

                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
							
                            <td><?php echo fromsqldatedmy($row['date']);?></td>
							<td><?php echo $row['work']; ?></td>
							<td><?php echo $row['full_name']; ?></td>
							
							
							
						<!--<td width="50px" style="text-align:right"><a class="btn btn-info fa fa-view" href="view_ec.php?id=<?php echo $row['id']; ?>">&nbsp;View</a></td>	
                    <td width="50px" style="text-align:right"><a class="btn btn-info fa fa-edit" href="edit_ec.php?id=<?php echo $row['id']; ?>">&nbsp;Edit</a></td>-->
                                    <td style="text-align:right"><a class="btn btn-danger fa fa-trash-o"
                                                                    href="delete_view_ec.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
                                    </td>
                                 
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include "footer.php"; ?>
</body>
</html>