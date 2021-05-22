<?php
session_start();
$page = "users";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "superadmin") && ($_SESSION['user_type'] != "admin")) header("location: index.php");
$company_id=$_SESSION['company_id'];
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
                    <a href="new_user.php" class="btn btn-info fa fa-plus pull-right">&nbsp;New
                        <?php if($_SESSION['user_type']=="superadmin"){ ?>
                            Company
                        <?php }else if($_SESSION['user_type']=="admin"){ ?>
                            User
                        <?php } ?>
                    </a>
                    <br>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTables-example">
                        <thead>
                        <tr style="background-color: #81888c;color:white" >
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th width="50px" style="text-align:right">Edit</th>
                            <th width="50px" style="text-align:right">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        function can_delete($id)
                        {
                            $flag = true;
                            $sql = "select * from galaxy_rights where user_id=$id";
                            $result = mysqli_query($GLOBALS['conn'], $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $flag = false;
                            }
                            return $flag;
                        }

                        if($_SESSION['user_type']=="superadmin"){
                            $sql = "select * from galaxy_users where user_type='admin' order by user_type,full_name";
                        }else if($_SESSION['user_type']=="admin"){
                            $sql = "select * from galaxy_users where user_type='staff' order by user_type,full_name";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['full_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo nl2br($row['address']); ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td width="50px" style="text-align:right"><a class="btn btn-info fa fa-edit" href="edit_user.php?id=<?php echo $row['id']; ?>">&nbsp;Edit</a></td>
                                <?php if (can_delete($row['id'])) { ?>
                                    <td style="text-align:right"><a class="btn btn-danger fa fa-trash-o"
                                                                    href="delete_user.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
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