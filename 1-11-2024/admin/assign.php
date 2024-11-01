<?php
session_start();
include "timeout.php";
include "config.php";
$page="assign";
$msg = "";
$msg_color = "green";
$date= "";

$staff_id = $_SESSION['user_id'];
$project_id=$_GET['id'];	
if (isset($_POST['submit'])) {
        $date = date("y/m/d");
    $user_id = $_POST['user_id'];
    $work = $_POST['work'];

    $sql = "SELECT * FROM galaxy_rights WHERE project_id=$project_id and user_id=$user_id";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {

    } else {
        $stmt = $conn->prepare("INSERT INTO galaxy_rights (work,staff_id,project_id,user_id,date) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$work,$staff_id,$project_id,$user_id,$date);
        $stmt->execute();
    header("location: project.php");
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
                    <b>Assign Project</b>
                    <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3" style="border-right: 1px solid #efefef;">

                                <div class="form-group">
                                    <label for="user_id required"
                                           class="control-label">User</label>
                                    <select name="user_id" required="required" class="form-control" >
                                        <option value="">Select</option>
										
                                        <?php
										if($_SESSION['user_type']=="admin"){
                                        $sql = "select * from galaxy_users order by full_name";
										
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
                                        <div class="form-group">
                                            <label for="work required"
                                                   class="control-label required">Work Description</label>
                                            <input value="" required="required" type="text"
                                                   maxlength="500"
                                                   name="work" id="work" class="form-control"
                                                   placeholder="Work Description">
                                        </div>
<div class="form-group">
                                            <label for="date required"
                                                   class="control-label required">Date</label>
                                            <input value="" required="required" type="date"
                                                   maxlength="500"
                                                   name="date" id="work" class="form-control"
                                                   placeholder="Work Description">
                                        </div>

                            </div>
                        
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <input required="required" class="btn btn-info"
                                       type="submit"
                                       name="submit" value="Save"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr style="background-color: #81888c;color:white">
                        <th>Project</th>
                        <th>Work</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $sql = "select a.id,work,b.project_name,c.full_name from galaxy_rights a,galaxy_project b,galaxy_users c where a.project_id=b.id and a.user_id=c.id and a.staff_id=$user_id order by project_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['project_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['work']; ?>
                            </td>
                            <td>
                                <?php echo $row['full_name']; ?>
                            </td>
 <td>
                                <?php echo fromsqldatedmy($row['date']); ?>
                            </td>
                            <td><a class="btn btn-danger fa fa-trash-o"  href="delete_assign.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a></td>
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

<?php include "footer.php"; ?>

</body>


</html>