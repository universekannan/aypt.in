<?php
session_start();
include "timeout.php";
include "config.php";
$page="attendance";
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
    <?php include "admin-settings.php"; ?>
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
		        <div class="col-md-12" style="padding-bottom: 5px" >
					<a href="out_attendance.php" class="btn btn-info fa fa-plus pull-right">&nbsp;Out Time Attendance</a>
                    <a href="in_attendance.php" class="btn btn-info fa fa-plus pull-right">&nbsp;In Time Attendance</a>
                </div>
            <div class="col-md-12">
			                    <div class="table-responsive">

                    <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr style="background-color: #81888c;color:white">
                        <th>Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $sql = "select a.*,b.full_name from galaxy_attendance a,galaxy_users b where
                            a.user_id=b.id and a.date>='$from_date' and a.date<='$to_date'
                            order by date,user_id";
                    $result = mysqli_query($conn, $sql);
                    $old_date=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($old_date!=$row['date']){
                            echo "<tr><td colspan='4' align='center'>".fromsqldatedmy($row['date'])."</td></tr>";
                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['full_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['time_in']; ?>
                            </td>
                            <td>
                                <?php echo $row['time_out']; ?>
                            </td>
                            <td>
                                <a class="btn btn-danger fa fa-trash-o"
                                        href="delete-attendance.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
                            </td>
                        </tr>
                        <?php
                        $old_date=$row['date'];
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