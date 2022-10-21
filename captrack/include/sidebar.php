<?php 
include "admin/conn.php";
//session_start();
?>

    <?php
      $i = 1;
      //$id=$_GET['id'];
      $sql2 = $conn->prepare("SELECT * FROM registration where id='".$_SESSION['id']."'");
      $sql2->execute();
      $result2 = $sql2->fetch(PDO::FETCH_OBJ);                
    ?>   
                <!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="javascript:void(0);">
							<img height="50" width="70" src="images/captrack.jpg" alt="user-img" >
							<img src="images/logo.jpg" class="header-brand-img dark-logo" alt="">
							<img src="images/logo.jpg" class="header-brand-img mobile-logo" alt="">
							<img src="images/logo.jpg" class="header-brand-img darkmobile-logo" alt="">
						</a>
					</div>
					<div class="app-sidebar3">
						<div class="app-sidebar__user pb-3">
							<div class="dropdown user-pro-body text-center">
								<div class="user-pic">
									<img src="images/<?php echo $result2->image; ?>" alt="user-img" class="avatar-xxl rounded-circle mb-1">
								
								</div>
								<div class="user-info">
									<h5 class=" mb-2"><?php echo $result2->fname; ?> <?php echo $result2->lname; ?></h5>
									<span class="text-muted app-sidebar__user-name text-sm"><?php echo $result2->designation; ?></span>
								</div>
							</div>
							
						</div>
				<?php      
                    
                     $stmt1 = $conn->prepare("SELECT * from attendance WHERE employee_id='".$_SESSION['id']."' AND status='Present'");
                     $stmt1->execute();
                ?>

                <?php      
                    
                     $stmt2 = $conn->prepare("SELECT * from leaves WHERE employee_id='".$_SESSION['id']."' AND status='Accept'");
                     $stmt2->execute();
                ?>
						<div class="d-flex emp_details">
							<div class="attendance text-center">
								<h5 class="mb-1">
									<span class="fs-18 text-success"><?php echo $stmt1->rowCount();?></span>
									<span class="my-auto fs-9 font-weight-normal text-white-50 ml-1 mr-1">/</span>
									<span class="fs-18 text-white font-weight-light">31</span>
								</h5>
								<span class="fs-12 mb-0 pb-0">Attendance</span>
							</div>
							<div class="attendance text-center">
								<h5 class="mb-1">
									<span class="fs-18 text-orange"><?php echo $stmt2->rowCount();?></span>
									<span class="my-auto fs-9 font-weight-normal text-white-50 ml-1 mr-1">/</span>
									<span class="fs-18 text-white font-weight-light">12</span>
								</h5>
								<span class="fs-12 mb-0 pb-0">Leaves</span>
							</div>
						</div>
						<ul class="side-menu">
							<li class="side-item side-item-category mt-4">Dashboards</li>
							
							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="">
									<i class="feather  feather-users sidemenu_icon"></i>
									<span class="side-menu__label">Employee Dashboard</span><i class="angle fa fa-angle-right"></i>
								</a>
								<ul class="slide-menu">
									<!-- <li><a href="dashboard.php" class="slide-item">Dashboard</a></li> -->
									<li><a href="profile.php" class="slide-item">Profile</a></li>
									<!-- <li><a href="apply-leaves.php" class="slide-item">Apply Leaves </a></li>
									<li><a href="my-leaves.php" class="slide-item">My Leaves </a></li> -->
									<!-- <li><a href="salary-history.php" class="slide-item">Salary History </a></li> -->
									
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="feather feather-clipboard sidemenu_icon"></i>
									<span class="side-menu__label">Project Dashboard</span><i class="angle fa fa-angle-right"></i>
								</a>
								<ul class="slide-menu">
									
									<li><a href="add-project.php" class="slide-item">Add Project</a></li>
									<li><a href="project-list.php" class="slide-item">Project Added By Me</a></li>
									
									<li><a href="project-assigned.php" class="slide-item">Project Assigned To Me</a></li>
									
								
								</ul>
							</li>



								<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="feather feather-clipboard sidemenu_icon"></i>
									<span class="side-menu__label">Review</span><i class="angle fa fa-angle-right"></i>
								</a>
								<ul class="slide-menu">
									
									<li><a href="review.php" class="slide-item">Review</a></li>
									
									
								
								</ul>
							</li>
							
								<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="feather feather-clipboard sidemenu_icon"></i>
									<span class="side-menu__label">Store</span><i class="angle fa fa-angle-right"></i>
								</a>
								<ul class="slide-menu">
									
									<li><a href="store.php" class="slide-item">Store</a></li>
									<li><a href="order-summary.php" class="slide-item">Order Summary</a></li>
									
									
								
								</ul>
							</li>
							
							
							
							
							
						
						
							
						
						</ul>
						
					</div>
				</aside>
				<!--aside closed-->
				   
<script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>