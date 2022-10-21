<?php 
include "../admin/conn.php";
//session_start();
?>

    <?php
      $i = 1;
      //$id=$_GET['id'];
      $sql2 = $conn->prepare("SELECT * FROM adminlogin where id='".$_SESSION['id']."'");
      $sql2->execute();
      $result2 = $sql2->fetch(PDO::FETCH_OBJ);                
    ?>                <!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="javascript:void(0);">
							<img src="images/logo.png" class="header-brand-img desktop-lgo" alt="">
							<img src="images/logo.png" class="header-brand-img dark-logo" alt="">
							<img src="images/logo.png" class="header-brand-img mobile-logo" alt="">
							<img src="images/logo.png" class="header-brand-img darkmobile-logo" alt="">
						</a>
					</div>
					<div class="app-sidebar3">
						<div class="app-sidebar__user pb-3">
							<div class="dropdown user-pro-body text-center">
								<div class="user-pic">
									<img src="../images/<?php echo $result2->image; ?>" alt="user-img" class="avatar-xxl rounded-circle mb-1">
								
								</div>
								<div class="user-info">
									<h5 class=" mb-2"><?php echo $result2->fname; ?> <?php echo $result2->lname; ?></h5>
									<span class="text-muted app-sidebar__user-name text-sm">Admin</span>
								</div>
							</div>
							
						</div>
					
						<ul class="side-menu">
							<li class="side-item side-item-category mt-4">Dashboards</li>
							
							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="">
									<i class="feather  feather-users sidemenu_icon"></i>
									<span class="side-menu__label">Admin Dashboard</span><i class="angle fa fa-angle-right"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="dashboard.php" class="slide-item">Dashboard</a></li>
									<!-- <li><a href="javascript:void(0);" class="slide-item">View Attendance</a></li> -->
									<!-- <li><a href="user-attendance.php" class="slide-item">Employee Attendance</a></li> -->
									<li><a href="employee-profile.php" class="slide-item">Add Employee</a></li>
									<li><a href="employee-list.php" class="slide-item">Employee List</a></li>
                                    
									<li><a href="add-product.php" class="slide-item">Add Product</a></li>
									<li><a href="product-list.php" class="slide-item">Product List</a></li>									
									
								</ul>
							</li>
						
						</ul>
						
					</div>
				</aside>
				
<script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
				