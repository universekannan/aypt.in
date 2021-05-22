<?php
session_start();
include "timeout.php";
include "config.php";
$page = "inactive";
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
                    <a href="add_project.php" class="btn btn-info fa fa-plus pull-right">&nbsp;Add Project</a>
                    <br>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTables-example">
                        <thead>
                        <tr style="background-color: #81888c;color:white">
                            <th>Project Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Follow Up</th>
                            <th width="50px" style="text-align:right">Edit</th>
                            <th width="50px" style="text-align:right">Qutasan</th>
                            <th width="50px" style="text-align:right">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        function can_delete($id)
                        {
                            $flag = true;
                            $sql = "select * from galaxy_rights where project_id=$id";
                            $result = mysqli_query($GLOBALS['conn'], $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $flag = false;
                            }
                            return $flag;
                        }
                        if($_SESSION['user_type']=="admin"){
                            $sql = "select a.*,b.description from galaxy_project a,galaxy_category b where a.status='Inactive' and a.category_id=b.id order by category_id";
                        }else{
                            $user_id=$_SESSION['user_id'];
                            $sql = "select a.*,b.description from galaxy_project a,galaxy_category b where a.status='Inactive' and a.category_id=b.id and a.id in(select project_id from galaxy_rights where user_id=$user_id) order by category_id";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['project_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo fromsqldatedmy($row['follow_up']); ?></td>
                                <td><a class="btn btn-info fa fa-edit"
                                       href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank">&nbsp;Edit</a></td>
                                <td><a class="btn btn-info fa fa-edit"
                                       href="qutasan.php?id=<?php echo $row['id']; ?>" target="_blank">&nbsp;Qutasan</a></td>                                <?php if (can_delete($row['id'])) { ?>
                                    <td style="text-align:right"><a class="btn btn-danger fa fa-trash-o"
                                                                    href="delete_project.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
                                    </td>
                                <?php } else { ?>
                                    <td>&nbsp;</td>
                                <?php } ?>
                            </tr>
                            <?php

                        }
                        ?>
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