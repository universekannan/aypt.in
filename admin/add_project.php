<?php
session_start();
include "timeout.php";
include "config.php";
$page = "project";
$msg = "";
$msg_color = "";
$category_id = "";
$project_name = "";
$website_url = "";
$email = "";
$mobile = "";
$address = "";
$amount = "";
$pro_old_balance = "";
$status = "Inactive";
$latest_update = "";
$follow_up = date("Y-m-d");

if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $project_name = $_POST['project_name'];
    $website_url = $_POST['website_url'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $pro_old_balance = $_POST['pro_old_balance'];
    $status = $_POST['status'];
    $latest_update = $_POST['latest_update'];
    $follow_up = $_POST['follow_up'];


    $msg_color = "green";
    $msg = "Project added successfully";
    $stmt = $conn->prepare("INSERT INTO galaxy_project (category_id,project_name,website_url,email,mobile,address,amount,pro_old_balance,status,latest_update,
    follow_up) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss",$category_id, $project_name, $website_url, $email, $mobile, $address, $amount, $pro_old_balance=$amount, $status, $latest_update, $follow_up);
    $stmt->execute();
    
    $project_id = $stmt->insert_id;
    $user_id=$_SESSION['user_id'];

    if($_SESSION['user_type']=="staff") {
        $stmt = $conn->prepare("INSERT INTO galaxy_rights (project_id,user_id) VALUES (?,?)");
        $stmt->bind_param("ss",$project_id, $user_id);
        $stmt->execute() ;
    }

    header("location: project.php");

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
                            <b>Add Project</b>
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category_id required"
                                                   class="control-label required">Category</label>
                                            <select name="category_id" class="form-control" required="required" >
                                                <option value="">Select</option>
                                                <?php
                                                $sql2 = "select * from galaxy_category order by description";
                                                $result2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    ?>
                                                    <option value="<?php echo $row2['id']; ?>" ><?php echo $row2['description']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_name required"
                                                   class="control-label required">Project Name</label>
                                            <input value="<?php echo $project_name; ?>" required="required" type="text"
                                                   maxlength="50"
                                                   name="project_name" id="project_name" class="form-control"
                                                   placeholder="Project Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="website_url"
                                                   class="control-label">Website URL</label>
                                            <input value="<?php echo $website_url; ?>" type="text"
                                                   maxlength="500"
                                                   name="website_url" id="website_url" class="form-control"
                                                   placeholder="Website URL">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                   class="control-label">Email</label>
                                            <input value="<?php echo $email; ?>" type="email" maxlength="100"
                                                   name="email" id="email" class="form-control"
                                                   placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile"
                                                   class="control-label">Mobile</label>
                                            <input value="<?php echo $mobile; ?>" type="text" maxlength="100"
                                                   name="mobile" id="mobile" class="form-control"
                                                   placeholder="Mobile">
                                        </div>

                                        <div class="form-group">
                                            <label for="amount"
                                                   class="control-label">Amount</label>
                                            <input value="<?php echo $mobile; ?>" type="text" maxlength="100"
                                                   name="amount" id="amount" class="form-control"
                                                   placeholder="Amount">
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="control-label">Address</label>
                                            <textarea rows="5" maxlength="500" name="address" id="address"
                                                      class="form-control"
                                                      placeholder="Address"><?php echo $address; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="control-label required">Status</label>
                                            <select name="status" id="status" class="form-control">
									    		<option <?php if ($status == "Live") echo " selected='selected'"; ?>
                                                    value="Live">Live Project
                                                </option>
                                                <option <?php if ($status == "Active") echo " selected='selected'"; ?>
                                                    value="Active">Active
                                                </option>
                                                <option <?php if ($status == "Inactive") echo " selected='selected'"; ?>
                                                    value="Inactive">Inactive
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="latest_update" class="control-label">Latest Update</label>
                                            <textarea rows="1" maxlength="500" name="latest_update" id="latest_update"
                                                      class="form-control"
                                                      placeholder="Latest Update"><?php echo $latest_update; ?></textarea>
                                        </div>

                                    <div class="form-group">
                                        <label for="follow_up" class="control-label">Follow Up</label>
                                        <input value="<?php echo $follow_up; ?>" onkeydown="return false"
                                               type="date"
                                               name="follow_up" id="follow_up" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input required="required" class="btn btn-info"
                                           type="submit"
                                           name="submit" value="Save"/>
                                    <a href="project.php" class="btn btn-info">Back</a>
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