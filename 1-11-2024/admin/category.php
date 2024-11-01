<?php
session_start();
include "timeout.php";
include "config.php";
if ($_SESSION['user_type'] != "admin") header("location: index.php");
$page = "category";
$msg = "";
$msg_color = "";
$description = "";

if (isset($_POST['submit'])) {
    $description = $_POST['description'];

    $msg_color = "green";
    $msg = "Category added successfully";
    $stmt = $conn->prepare("INSERT INTO galaxy_category (description) VALUES (?)");
    $stmt->bind_param("s", $description);
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
    <?php include "settings.php"; ?>
    <div id="page-wrapper" class="fixed-navbar ">
        <div class="container-fluid bg-gray">
            <div class="row" style="margin:0;">
                <div class="col-md-12">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading text-center">
                            <b>Add Category</b>
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description required"
                                                   class="control-label required">Category</label>
                                            <input required="required" type="text"
                                                   maxlength="50"
                                                   name="description" id="description" class="form-control"
                                                   placeholder="Category">
                                        </div>

                                </div>
                                <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info"
                                           type="submit"
                                           name="submit" value="Save"/>
                                    <a href="category.php" class="btn btn-info">Back</a>
                                </div>
                            </div>
                    </div>
                    </form>
                    <table class="table table-bordered table-striped" id="dataTables-example">
                        <thead>
                        <tr style="background-color: #81888c;color:white">
                            <th>Category</th>
                            <th width="50px" style="text-align:right">Edit</th>
                            <th width="50px" style="text-align:right">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        function can_delete($id)
                        {
                            $flag = true;
                            $sql = "select * from galaxy_project where category_id=$id";
                            $result = mysqli_query($GLOBALS['conn'], $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $flag = false;
                            }
                            return $flag;
                        }

                        $sql = "select * from galaxy_category order by description";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['description']; ?></td>
                                <td><a class="btn btn-info fa fa-edit"
                                       href="edit_category.php?id=<?php echo $row['id']; ?>">&nbsp;Edit</a></td>
                                <?php if (can_delete($row['id'])) { ?>
                                    <td style="text-align:right"><a class="btn btn-danger fa fa-trash-o"
                                                                    href="delete_category.php?id=<?php echo $row['id']; ?>">&nbsp;Delete</a>
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