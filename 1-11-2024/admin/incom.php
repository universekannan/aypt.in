<?php
session_start();
$page = "incom";
include "timeout.php";
include "config.php";
if ($_SESSION['user_type'] != "admin") header("location: index.php");
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
               

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTables-example">
                        <thead>
						<tr style="background-color: steelblue;color:white">
                            <th style="text-align: center" colspan="12">In Com Amount</th>	
                        </tr>
                        <tr style="background-color: #81888c;color:white" >
                            <th>Date</th>
                            <th>Project</th>
   						    <th>Amount</th>
                            <th>User Name</th>
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
				   $sql = "select a.*,b.project_name,c.full_name from galaxy_amound a,galaxy_project b,galaxy_users c where a.project_id=b.id and a.user_id=c.id";
				  // $sql = "select *from galaxy_amound";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
							
                            <td><?php echo $row['date']; ?></td>
							<td><?php echo $row['project_name']; ?></td>
							<td><?php echo $row['payed']; ?></td>
							<td><?php echo $row['full_name']; ?></td>
							
							
							
						<!--<td width="50px" style="text-align:right"><a class="btn btn-info fa fa-view" href="view_ec.php?id=<?php echo $row['id']; ?>">&nbsp;View</a></td>	
                    <td width="50px" style="text-align:right"><a class="btn btn-info fa fa-edit" href="edit_ec.php?id=<?php echo $row['id']; ?>">&nbsp;Edit</a></td>
                                    <td style="text-align:right"><a class="btn btn-danger fa fa-trash-o"
                                     href="delete_view_ec.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
                                    </td>-->
                                 
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