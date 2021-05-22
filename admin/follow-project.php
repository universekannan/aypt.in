<?php
session_start();
include "timeout.php";
include "config.php";
$page="project";
$company_id = $_SESSION['company_id'];
$from_date=date("Y-m-d");
$to_date=date("Y-m-d");
if (isset($_POST['submit'])) {
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
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
                    <b>Attendance</b>
                    <form class="form-inline" role="form" method="post">
                        <div class="form-group">
                            <label>From Date</label>
                            <input class="form-control" value="<?php echo $from_date; ?>" required type="date" name="from_date"  >
                            <label>To Date</label>
                            <input class="form-control" value="<?php echo $to_date; ?>" required type="date" name="to_date"  >
                            <input required="required" class="btn btn-info" type="submit" name="submit" value="Show"/>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #81888c;color:white">
 <th>Project Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Latest Update</th>
                            <th>Follow Up</th>
                            <th width="50px" style="text-align:right">Edit</th>
                            
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
                            $sql = "select a.*,b.description from galaxy_project a,galaxy_category b where a.status<>'Inactive' and a.category_id=b.id and company_id=$company_id order by category_id";
                        }else{
                            $user_id=$_SESSION['user_id'];
                            $sql = "select a.*,b.description from galaxy_project a,galaxy_category b where a.category_id=b.id and company_id=$company_id and a.id in(select project_id from galaxy_rights where user_id=$user_id) order by category_id";
							}
                        $result = mysqli_query($conn, $sql);
                    $old_date=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                          if($old_date!=$row['follow_up']){
                            echo "<tr><td colspan='3' align='center'>".fromsqldatedmy($row['follow_up'])."</td></tr>";
                        }
                        ?>
                            <tr>
                                <td><?php echo $row['project_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['latest_update']; ?></td>
                                <td><?php echo fromsqldatedmy($row['follow_up']); ?></td>
                                <td><a class="btn btn-info fa fa-edit"
                                       href="edit_project.php?id=<?php echo $row['id']; ?>">&nbsp;Edit</a></td>
 
                            </tr>
                            <?php
                              $old_date=$row['follow_up'];
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