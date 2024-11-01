<?php
session_start();
include "timeout.php";
include "config.php";
if ($_SESSION['user_type'] != "superadmin") header("location: index.php");
$page = "category";
$msg = "";
$msg_color = "";
$description = "";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $description = $_POST['description'];

    $stmt = $conn->prepare("update galaxy_category set description=? where id=?");
    $stmt->bind_param("si", $description,$id);
    $stmt->execute();
    header("location: category.php");
}
$sql = "select * from galaxy_category where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
                            <b>Edit Category</b>
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description required"
                                                   class="control-label required">Category</label>
                                            <input value="<?php echo $row['description']; ?>" required="required" type="text"
                                                   maxlength="50"
                                                   name="description" id="description" class="form-control"
                                                   placeholder="Category">
                                        </div>

                                </div>
                                <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info"
                                           type="submit"
                                           name="submit" value="Update"/>
                                    <a href="category.php" class="btn btn-info">Back</a>
                                </div>
                            </div>
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