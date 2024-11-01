<?php
session_start();
$page = "users";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "superadmin") && ($_SESSION['user_type'] != "admin")) header("location: index.php");
$id = $_GET['id'];
$msg = "";
$msg_color = "";
$full_name = "";
$email = "";
$status = "Active";
$password = "";
$role = "";
$mobile = "";
$address = "";
if (isset($_POST['submit'])) {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $status = $_POST['status'];
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);

    $sql = "SELECT * FROM galaxy_users WHERE trim(email)='$email' and id<>$id";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "Username or Email already in use";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        if($_SESSION['user_type']=="superadmin") {
            $msg = "Company updated successfully";
        }else{
            $msg = "User updated successfully";
        }
        $stmt = $conn->prepare("update galaxy_users set role=?,full_name=?,email=?,status=?,password=?,mobile=?,address=? where id=?");
        $stmt->bind_param("ssssssss",$role, $full_name, $email, $status, $password, $mobile, $address, $id);
        $stmt->execute();

        /*$file_name = $_FILES['logo']['name'];
        if (trim($file_name) != "") {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $id . "." . $ext;
            $query = "update users set logo = '" . $file_name . "' where id=$id";
            mysqli_query($conn, $query);
            $target_path = "uploads/logo/";
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['logo']['tmp_name'], $target_path);
        }*/

        header("location: users.php");
    }

}
$sql = "select * from galaxy_users where id=$id";
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
    <div id="wrapper">
        <?php include "settings.php"; ?>
        <div id="page-wrapper" class="fixed-navbar ">
            <div class="container-fluid bg-gray">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading text-center">
                                Edit
                                <?php if($_SESSION['user_type']=="superadmin"){ ?>
                                    Company
                                <?php }else if($_SESSION['user_type']=="admin"){ ?>
                                    User
                                <?php } ?>
                                <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <?php if($_SESSION['user_type']=="superadmin"){ ?>
                                                <div class="form-group">
                                                    <label for="full_name required"
                                                           class="control-label required">Church Name</label>
                                                    <input value="<?php echo $row['full_name']; ?>" required="required" type="text"
                                                           maxlength="50"
                                                           name="full_name" id="full_name" class="form-control"
                                                           placeholder="Church Name">
                                                </div>
                                            <?php }else if($_SESSION['user_type']=="admin"){ ?>
                                                <div class="form-group">
                                                    <label for="full_name required"
                                                           class="control-label required">Full Name</label>
                                                    <input value="<?php echo $row['full_name']; ?>" required="required" type="text"
                                                           maxlength="50"
                                                           name="full_name" id="full_name" class="form-control"
                                                           placeholder="Full Name">
                                                </div>
                                            <?php } ?>

                                            <!--<div class="form-group">
                                                <label for="logo"
                                                       class="control-label">Image(400x100)</label>
                                                <img width="200" height="50"
                                                     src="uploads/logo/<?php /*echo $row['logo']; */?>?<?php /*echo rand(); */?>"
                                                />
                                                <input type="file"
                                                       name="logo" id="logo" class="form-control">
                                            </div>-->
                                            <div class="form-group">
                                                <label for="email" class="control-label">Username or Email</label>
                                                <input value="<?php echo $row['email']; ?>" maxlength="50" type="text"
                                                       name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label required">Password</label>
                                                <input value="<?php echo $row['password']; ?>" type="text"
                                                       maxlength="20"
                                                       name="password" id="password" class="form-control"
                                                       placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="password" class="control-label">Role</label>
                                                <input value="<?php echo $row['role']; ?>" type="text" maxlength="50"
                                                       name="role" id="role" class="form-control"
                                                       placeholder="Role">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile" class="control-label">Mobile</label>
                                                <input value="<?php echo $row['mobile']; ?>" maxlength="20"
                                                       name="mobile" class="form-control" placeholder="Mobile">
                                            </div>

                                            <div class="form-group">
                                                <label for="mobile" class="control-label">Address</label>
                                                <textarea maxlength="200" name="address" class="form-control"
                                                          placeholder="Address"><?php echo $row['address']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label required">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option <?php if ($row['status'] == "Active") echo " selected='selected'"; ?>
                                                        value="Active">Active
                                                    </option>
                                                    <option <?php if ($row['status'] == "Inactive") echo " selected='selected'"; ?>
                                                        value="Inactive">Inactive
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group text-center">
                                                <input required="required" class="btn btn-info"
                                                       type="submit"
                                                       name="submit" value="Update"/>
                                                <a href="users.php" class="btn btn-info">Back</a>                                           </div>
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