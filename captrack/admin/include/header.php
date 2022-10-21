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
    ?>
 <!--app header-->
 <div class="app-header header">
 	<div class="container-fluid">
 		<div class="d-flex">
 			<a class="header-brand" href="javascript:void(0);">
 				<img src="images/logo.png" class="header-brand-img desktop-lgo" alt="">
 				<img src="images/logo.png" class="header-brand-img dark-logo" alt="">
 				<img src="images/logo.png" class="header-brand-img mobile-logo" alt="">
 				<img src="images/logo.png" class="header-brand-img darkmobile-logo" alt="">
 			</a>
 			<div class="app-sidebar__toggle" data-toggle="sidebar">
 				<a class="open-toggle" href="#">
 					<i class="feather feather-menu"></i>
 				</a>
 				<a class="close-toggle" href="#">
 					<i class="feather feather-x"></i>
 				</a>
 			</div>
 			
 			<div class="d-flex order-lg-2 my-auto ml-auto">
 				
 				
 				<div class="dropdown header-fullscreen">
 					<a class="nav-link icon full-screen-link">
 						<i class="feather feather-maximize fullscreen-button fullscreen header-icons"></i>
 						<i class="feather feather-minimize fullscreen-button exit-fullscreen header-icons"></i>
 					</a>
 				</div>
 			
 				
 				<div class="dropdown profile-dropdown">
 					<a href="#" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
 						<span>
 							<img src="../images/<?php echo $result2->image; ?>" alt="img" class="avatar avatar-md bradius">
 						</span>
 					</a>
 					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
 						<div class="p-3 text-center border-bottom">
 							<a href="#" class="text-center user pb-0 font-weight-bold"><?php echo $result2->fname; ?> <?php echo $result2->lname; ?></a>
 							<p class="text-center user-semi-title">Admin</p>
 						</div>
 						<a class="dropdown-item d-flex" href="profile.php">
 							<i class="feather feather-user mr-3 fs-16 my-auto"></i>
 							<div class="mt-1">Profile</div>
 						</a>
 						
 						
 						<a class="dropdown-item d-flex" href="#" data-toggle="modal" data-target="#changepasswordnmodal">
 							<i class="feather feather-edit-2 mr-3 fs-16 my-auto"></i>
 							<div class="mt-1">Change Password</div>
 						</a>
 						<a class="dropdown-item d-flex" href="logout.php">
 							<i class="feather feather-power mr-3 fs-16 my-auto"></i>
 							<div class="mt-1">Sign Out</div>
 						</a>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
						<!--/app header-->