<?php
ob_start();
session_start();
include"admin/conn.php";
if(isset($_SESSION['id']))
{

date_default_timezone_set("Canada/Eastern");

$present_date=date("Y-m-d");

 $sql21 = $conn->prepare("SELECT * FROM products where product='".$_GET['product']."'");
      $sql21->execute();
      $result21 = $sql21->fetch(PDO::FETCH_OBJ); 

if(isset($_POST['pay']))
{

$sql31 = $conn->prepare("UPDATE registration set points=points-'".$result21->price."' where id='".$_SESSION['id']."' "); 
 $sql31->execute();   

$sql22 = $conn->prepare("INSERT INTO `orders`(`employee_id`, `product`, `product_id`, `order_date`, `order_price`) VALUES ('".$_SESSION['id']."','".$_GET['product']."','".$result21->id."','".$present_date."','".$result21->price."')");
$sql22->execute(); 
 $last_id = $conn->lastInsertId(); 
header("location:order-confirmed.php?id=$last_id");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<title>Captrack</title>
		<?php include"include/meta.php"; ?>

		<!-- Bootstrap css -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Style css -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/dark.css" rel="stylesheet">
		<link href="css/skin-modes.css" rel="stylesheet">

		<!-- Animate css -->
		<link href="css/animated.css" rel="stylesheet">

		<!--Sidemenu css -->
        <link href="css/sidemenu.css" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="css/p-scrollbar.css" rel="stylesheet">

		<!---Icons css-->
		<link href="css/icons.css" rel="stylesheet">

		<!---Sidebar css-->
		<link href="css/sidebar.css" rel="stylesheet">

		<!-- Select2 css -->
		<link href="css/select2.min.css" rel="stylesheet">

        
		<!-- INTERNAL Pg-calendar-master css -->
		<link href="css/pignose.calendar.css" rel="stylesheet">

		<!--- INTERNAL jvectormap css-->
		<link href="css/jqvmap.css" rel="stylesheet">

		<!-- INTERNAL Time picker css -->
		<link href="css/jquery.timepicker.css" rel="stylesheet">

		<!-- INTERNAL Data table css -->
		<link href="css/datatables.min.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="css/buttons.bootstrap4.min.css" rel="stylesheet">
		<link href="css/responsive.bootstrap4.min.css" rel="stylesheet">

		<!-- INTERNAL jQuery-countdowntimer css -->
		<link href="css/jQuery.countdownTimer.css" rel="stylesheet">

		<!-- INTERNAL Daterangepicker css-->
		<link rel="stylesheet" href="css/daterangepicker.css">


        <!-- INTERNAL Switcher css -->
		<link href="css/switcher.css" rel="stylesheet">
		<link href="css/demo.css" rel="stylesheet">

	</head>

	<body class="app sidebar-mini" id="index1">


		<!---Global-loader-->
		<div id="global-loader">
			<img src="fonts/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">

	<?php include"include/sidebar.php"; ?>

				<div class="app-content main-content">
					<div class="side-app">

	<?php include"include/header.php"; ?>                       

    <?php
      $i = 1;
      //$id=$_GET['id'];
      $sql2 = $conn->prepare("SELECT * FROM registration where id='".$_SESSION['id']."'");
      $sql2->execute();
      $result2 = $sql2->fetch(PDO::FETCH_OBJ);                
    ?>            
						 

						<!--Page header-->
						<div class="page-header d-lg-flex d-block">


							<div class="page-leftheader">
								<h4 class="page-title">Checkout </h4>
							</div>
							
						</div>
						<!--End Page header-->
						<?php
                            if (isset($_SESSION['c21'])) {
                            echo $_SESSION['c21'];
                            
                            }
                            unset ($_SESSION["c21"]);
                        ?>


                        <div class="page-left">
								<h5 class="">My Points: <?php echo $result2->points; ?> </h5>
							</div>

						<!-- Row -->
						<div class="row">
							<div class="col-xl-3 col-lg-4 col-md-12">
								
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="main-content-body main-content-body-profile card mg-b-20">
									<!-- main-profile-body -->
									<div class="main-profile-body">
										<div class="tab-content">
											<div class="tab-pane show active" id="about">
												<div class="card-body">


													<div class="main-profile-contact-list d-lg-flex">

														<div class="media mr-4">
															<span class="avatar avatar-xxl brround" style="background-image: url(images/<?php echo $result21->image; ?>)">
											                </span>
														</div>
													
														<div class="media mr-4">														
															<div class="media-body">
																<h5 class="pro-user-username text-dark mb-1 fs-16"><?php echo $result21->product; ?></h5>
												               	
															</div>

														</div>

														<div class="media-body text-right">
																<h5 class="pro-user-username text-dark mb-1 fs-16">Qty</h5>
												                <h5 class="pro-user-desc text-dark fs-12">1</h5>	
														</div>

													</div><!-- main-profile-contact-list -->

													


													

												</div>
											
												
												<div class="card-body border-top">
													<div class="main-profile-contact-list d-lg-flex">
													<h5 class="font-weight-semibold">Subtotal</h5>
													<div class="media-body text-right">
																<h5 class="pro-user-username text-dark mb-1 fs-16"><?php echo $result21->price; ?></h5>
												                	
														</div>

													</div>



													<div class="main-profile-contact-list d-lg-flex">
													<h3 class="font-weight-semibold">Total</h3>
													<div class="media-body text-right">
																<h3 class="pro-user-username text-dark"><?php echo $result21->price; ?></h3>
												                	
														</div>

													</div>

                                                    <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="btn-list">
													<!-- <a href="" class="btn btn-primary btn-lg mt-3">Pay</a>
 -->
													<form method="post" action="">
																	
																	<input hidden="" type="text" name="price" value="<?php echo $result21->price; ?>">
																	<input hidden="" type="text" name="point" value="<?php echo $result2->points; ?>">
																	<button class="btn btn-primary btn-lg mt-3" name="pay" type="submit" onClick="return confirm('Are you sure?')" value="Pay">Pay</button>
													</form>

												    </div>
												    </div>



													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div><!-- end app-content-->
			</div>
<?php include"include/footer.php"; ?>


		</div>

        <!-- Back to top -->
		<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

		<!--Moment js-->
		<script src="js/moment.js"></script>

		<!-- Jquery js-->
		<script src="js/jquery.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="js/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="js/circle-progress.min.js"></script>

		<!--Sidemenu js-->
		<script src="js/sidemenu.js"></script>

		<!-- P-scroll js-->
		<script src="js/p-scrollbar.js"></script>
		<script src="js/p-scroll1.js"></script>

		<!--Sidebar js-->
		<script src="js/sidebar.js"></script>

		<!-- Select2 js -->
		<script src="js/select2.full.min.js"></script>

        
		<!-- INTERNAL Datepicker js -->
		<script src="js/jquery-ui.js"></script>

		<!-- INTERNAL Apexchart js-->
		<script src="js/apexcharts.js"></script>

		<!-- INTERNAL Timepicker js -->
		<script src="js/jquery.timepicker.js"></script>
		<script src="js/toggles.min.js"></script>

		<!--INTERNAL Chart js -->
		<script src="js/chart.bundle.js"></script>
		<script src="js/utils.js"></script>

		<!-- INTERNAL Chartjs rounded-barchart -->
		<script src="js/chart.min.js"></script>
		<script src="js/rounded-barchart.js"></script>

		<!-- INTERNAL Data tables -->
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap4.js"></script>
		<script src="js/dataTables.buttons.min.js"></script>
		<script src="js/buttons.bootstrap4.min.js"></script>
		<script src="js/dataTables.responsive.min.js"></script>
		<script src="js/responsive.bootstrap4.min.js"></script>

		<!-- INTERNAL Pg-calendar-master js -->
		<script src="js/pignose.calendar.full.min.js"></script>

		<!-- INTERNAL jQuery-countdowntimer js -->
		<script src="js/jQuery.countdownTimer.js"></script>

		<!-- INTERNAL Daterangepicker js-->
		<script src="js/moment.min.js"></script>
		<script src="js/daterangepicker.js"></script>

		<!-- INTERNAL Index js-->
		<script src="js/index2.js"></script>
		<script src="js/emp-sidemenuchart.js"></script>

		<!-- Custom js-->
		<script src="js/custom.js"></script>

      <script type="text/javascript">
      	$('form').submit(function() {
      if (parseInt($('input[name="price"]').val()) > parseInt($('input[name="point"]').val())) {
      	alert('You dont have enough points to buy this item.');
        return false;
      }
      else{
        return true;
      }
    });
      </script>

      <body onload=???noBack();??? onpageshow=???if (event.persisted) noBack();??? onunload="">

<script type="text/javascript">
	window.history.forward();
function noBack() { window.history.forward(); }
</script>
<script type="text/javascript">

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	</body>
</html>
<?php } 
else{
header("location:profile.php");
}
?>

