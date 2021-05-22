<?php
session_start();
$page = "ec";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "staff")) header("location: index.php");
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$msg = "";
$msg_color = "";
$project_id="";
$date = "";
$date_time = "";
$description = "";
$pro_old_balance = "";
$old_balance = "";
$amount = "";
$payed = "";
$balance = "";

if (isset($_POST['submit'])) {

         $date =date("y/m/d");
         $description = $_POST['description'];
         $pro_old_balance = trim($_POST['pro_old_balance']);
         $payed= trim($_POST['payed']);
         $balance = trim($_POST['balance']);	
	
         $stmt = $conn->prepare("update galaxy_project set pro_old_balance=? where id=?");
         $stmt->bind_param("ss", $pro_old_balance=$balance, $id);
         $stmt->execute();
		
		 $stmt1 = $conn->prepare("INSERT INTO galaxy_amound(date,description,payed,balance,old_balance,user_id,project_id) VALUES (?,?,?,?,?,?,?)");
        $stmt1->bind_param("sssssss",$date,$description,$payed,$balance,$old_balance=$pro_old_balance+$payed,$user_id,$project_id=$id);
        $stmt1->execute()or die($stmt1->error);
        $id=$stmt1->insert_id;


        header("location: project.php");
    }


$sql = "select * from galaxy_amound where project_id=$id";
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
					                            <form method="post" action="" enctype="multipart/form-data">

                        <div class="login-panel panel panel-default">

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
	                                    <div class="form-group">
                                            <label for="description" class="control-label">Description</label>
												   <input value="<?php echo $description; ?>" type="text"   
                                        name="description" id="description" required="" class="form-control" placeholder="Description">
                                            </div>
											
				<div class="form-group">
                                            <label for="pro_old_balance" class="control-label">Old Balance</label>
                                            <input value="<?php echo $row['pro_old_balance'];?>" maxlength="20"  type ="text"
                                                   name="pro_old_balance" id="pro_old_balance" class="form-control">
                                        </div>
										
				    <div class="form-group">
                                            <label for="payed" class="control-label">Paid Amount</label>
                                            <input onkeypress="return runScript2(event)" onkeyup="calculate_amount()" value="<?php echo $payed;?>" maxlength="20"  type ="text"
                                                   name="payed" id="payed" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label for="balance" class="control-label">Balance</label>
                                            <input onkeyup="calculate_balance();" value="<?php echo $balance;?>" maxlength="20"  type ="text"
                                                   name="balance"  id="balance" class="form-control">
 
										</div>
                                            <div class="form-group text-center">
                                                <input required="required" class="btn btn-info"
                                                       type="submit"
                                                       name="submit" value="Update"/>
                                                <a href="" class="btn btn-info">Back</a>                                           </div>
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
	<script>
      function runScript(e) {
    if (e.keyCode == 13) {
        $("input[name='payed']").focus();
    }
    }

    function runScript2(e) {
    if (e.keyCode == 13) {
        var payed = ~~parseInt($('#payed').val());
        var amount= ~~parseInt($('#amount').val());
		var pro_old_balance= ~~parseInt($('#pro_old_balance').val());
        var balance=pro_old_balance+amount-payed;
        if(amount>0){
            add_row();
        }
    }
    }



     function  calculate_amount() {
        var payed = ~~parseInt($('#payed').val());
        var amount= ~~parseInt($('#amount').val());
		var pro_old_balance= ~~parseInt($('#pro_old_balance').val());
        var balance=pro_old_balance+amount-payed;
        $('#balance').val(balance);
    }

    function  calculate_balance() {
        var balance = ~~parseInt($('#balance').val());
        var balance=0;
        var amount = $('input[name="amount[]"]');
		var pro_old_balance = $('input[name="pro_old_balance[]"]');
        for(var j=0;j<i;j++){
            balance=balance+parseInt(amount.eq(j)+ pro_old_balance.eq(j).val());
        }
        balance=pro_old_balance+amount-payed;
        $('#balance').val(balance);
    }


</script>
</body>
</html>