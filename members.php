<?php
include "admin/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Team Yoga Parameswarar | Arulmigu Yoga Parameswarar Mottavilai Tamil Nadu In India</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <meta name="description" content="Arulmigu Yoga Parameswarar Temple  | Arulmigu Yoga Parameswarar Temple  Website - A Best Parameswarar Temple In India" />
		<meta name="Keywords" content="Arulmigu Yoga Parameswarar Temple  | Arulmigu Yoga Parameswarar Temple  Website - A Best Parameswarar Temple In India<" />
		<meta name="author" content="Galaxy Kannan" />
	    <meta name="copyright" content="Galaxy Technology Park Pvt Ltd" />	
	    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/homebanner.css" rel="stylesheet">
    <link href="css/screens.css" rel="stylesheet">

    <noscript>
        <link rel="stylesheet" type="text/css" href="css/nojs.css"/>
    </noscript>

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="js/html5shiv.js"></script>
    <script src="js/respond.js"></script>
     <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Top Section -->
<script language="javascript" type="text/javascript">


    function formHandler(form) {
        var URL = document.form1.year.options[document.form1.year.selectedIndex].value;
        window.location.href = URL;
    }
    // End -->
</script>
			<?php include("header.php"); ?>

<!-- Navigation Section-->
			<?php include("menu.php"); ?>

<br/>

<section id="get-in-touch">
        <div class="container">
		<div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Members List</h2>
               <br />
            </div>
                    
					<table id="example1" class="table table-bordered table-striped">
                    <thead>
                         <tr style="background-color: #7398ad;color:white">
                            <th width="25">Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                             <th width="50px">Status</th>
                            <th width="50" style="text-align:right">Action</th>
                           
                                        </tr>
                                    </thead>
                                       <tbody>
                        <?php
                            $sql = "select * from members";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
						<td>
                                <center>
                                <img width="20" height="25" src="photo/<?php echo $row['photo']; ?>?<?php echo rand(); ?>"/>
                                </center>
                                </td>
                                 <td><?php echo $row['full_name']; ?></td>

                                <td><?php echo $row['email']; ?></td>

                                <td><?php echo $row['phone']; ?></td>

                                <td><?php echo $row['status']; ?></td>

								<td>
								<a class="btn btn-info fa fa-eye" href="view-member.php?id=<?php echo $row['id']; ?>"></a>
                            </tr>
                        <?php

                        }
                        ?>
                        </tbody>
                                        </tbody>
									</table>
    </section>
<br/>

			<?php include("footer.php"); ?>

<!-- jQuery -->

<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
<script src="js/jquery.fancybox8cbb.js?v=2.1.5"></script>
<script src="js/bootstrap-datepicker.js"></script>


<script>
    $('.menuLine').affix({
        offset: {
            top: $('header').height()
        }
    });
</script>
<!-- Script to Activate the Carousel -->
<script>
    $('.dropdown').on('mouseenter mouseleave click tap', function () {
        $(this).toggleClass("open");
    });
</script>
<script>
    $(document).ready(function () {
        $("#watchProfile").click(function () {
            $("#myModal").modal();
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#da-slider').cslider({
            autoplay: true,
            bgincrement: 450
        });

    });
</script>

<script type="text/javascript">
    $(function () {
        $('#marquee-vertical').marquee();
        $('#next-live').marquee();
        $('#latest-news').marquee();
    });
</script>

<script>!function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = "../platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, "script", "twitter-wjs");</script>

<script type="text/javascript">
    $(function () {
        $('#popupload').modal();
    });
</script>

</body>

</html>
