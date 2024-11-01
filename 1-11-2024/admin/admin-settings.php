
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle pull-left margin left" data-toggle="collapse"
                data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h4 style="color:steelblue;font-weight: bold">Project Management</h4>
    </div>

    <ul class="nav navbar-top-links navbar-right hidden-xs">
		      
		<li class="dropdown">
            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
                New Project
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeInUp">
                    <?php
                    $date=date("Y-m-d");
                    $sql = "select * from galaxy_project where date='$date'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <li><a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank"><i class="fa fa fa-edit"></i> <?php echo $row['project_name']; ?></a>
				     <li class="divider"></li>
                </li>
				<?php
                    }
                    ?>
            </ul>
        </li>		<li class="dropdown">
            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
                Assigned To
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeInUp">
			<?php
					$sql = "select a.id,b.project_name,c.full_name from galaxy_rights a,galaxy_project b,galaxy_users c where a.project_id=b.id and a.user_id=c.id and a.staff_id=$user_id order by project_id and a.date='$date'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <li><a href="ina_edit_project.php?id=<?php echo $row['id']; ?>" target="_blank"><i class="fa fa fa-edit"></i> <?php echo $row['full_name']; ?> <?php echo $row['project_name']; ?></a>
				     <li class="divider"></li>
                </li>
				<?php
                    }
                    ?>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
                <?php echo $_SESSION['full_name']; ?>
                <img src="assets/images/user.jpg" alt="" data-src="assets/images/user.jpg"
                     data-src-retina="assets/images/user.jpg" class="img-responsive img-circle user-img">
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeInUp">
                <li><a href="password.php"><i class="fa fa-lock fa-fw"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<nav id="menu" class="navbar-default navbar-fixed-side hidden-xs" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
                <li <?php if($page=="live-project") echo "class='active'"; ?>><a href="live-project.php"><i class="fa fa-clone fa-fw"></i>Live Project</a></li>
            <?php
            if(($_SESSION['user_type']=="admin")||($_SESSION['user_type']=="pm")||($_SESSION['user_type']=="pd")){
                ?>
                <li <?php if($page=="inactive") echo "class='active'"; ?>><a href="project.php"><i class="fa fa-product-hunt fa-fw"></i>Projects</a></li>
            <?php
            }
            ?>
            <?php
            if(($_SESSION['user_type']=="admin")||($_SESSION['user_type']=="cv")||($_SESSION['user_type']=="cc")||($_SESSION['user_type']=="mm")){
                ?>
                <li <?php if($page=="inactive") echo "class='active'"; ?>><a href="inactive.php"><i class="fa fa-product-hunt fa-fw"></i>Inactive Projects</a></li>
            <?php
            }
            ?>
            <?php
            if(($_SESSION['user_type']=="admin")||($_SESSION['user_type']=="hr")){
                ?>
                <li <?php if($page=="users") echo "class='active'"; ?>><a href="users.php"><i class="fa fa-user fa-fw"></i>Users</a></li>
                <li <?php if($page=="attendance") echo "class='active'"; ?>><a href="attendance.php"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
            <?php
            }
            ?>
            <?php
            if($_SESSION['user_type']=="admin"){
                ?>
                <li <?php if($page=="category") echo "class='active'"; ?>><a href="category.php"><i class="fa fa-clone fa-fw"></i>Category</a></li>
                <li <?php if($page=="incom") echo "class='active'"; ?>><a href="incom.php"><i class="fa fa-clone fa-fw"></i>In Com</a></li>
                <li <?php if($page=="exbanse") echo "class='active'"; ?>><a href="exbanse.php"><i class="fa fa-clone fa-fw"></i>Exbanse</a></li>
				
            <?php
            }
            ?>
                <li <?php if($page=="users") echo "class='active'"; ?>><a  href="https://hangouts.google.com/call/l7nqtc4gefoeci7sn7dajdojtma?hl=en-GB&no_rd
" target="_blank"><i class="fa fa-user fa-fw"></i>Screen Share</a></li>
        </ul>
		
    </div>
</nav>
