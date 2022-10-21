<?php
ob_start();
session_start();
include"admin/conn.php";
if(isset($_SESSION['id']))
{


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

				<?php  include"include/sidebar.php"; ?>

				<div class="app-content main-content">
					<div class="side-app">

						<?php  include"include/header.php"; ?>                       


						<!--Page header-->
						



						<?php
						if (isset($_SESSION['addleave1'])) {
							echo $_SESSION['addleave1'];

						}
						unset ($_SESSION["addleave1"]);
						?>


						<div class="page-header d-xl-flex d-block">
							<div class="page-leftheader">
								<h4 class="page-title">Employee<span class="font-weight-normal text-muted ml-2">Dashboard</span></h4>
							</div>
							<div class="page-rightheader ml-md-auto">
								<div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
									
									
									<div class="d-lg-flex d-block">
										
									</div>
								</div>
							</div>
						</div>
						<!--End Page header-->
						<?php 
                          $sql = $conn->prepare("SELECT * FROM projects where status ='Completed' AND employee_id='".$_SESSION['id']."' "); 
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);
		$number_of_rows = $sql->rowcount(); 

						?>

						<!--Row-->
						<div class="row">
							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-7">
												<div class="mt-0 text-left"> <h5 class><a href="completed-project.php">Completed Projects</a></h5>
													<h3 class="mb-0 mt-auto text-success"><?php echo $number_of_rows; ?></h3>
												</div>
											</div>
											<div class="col-5">
												<div class="icon1 bg-success my-auto  float-right"> <i class="feather feather-file-text"></i> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
							
						</div>
						<!-- /Row-->




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
						<script src="js/emp-leaves.js"></script>
						<script src="js/index2.js"></script>
						<script src="js/emp-sidemenuchart.js"></script>

						<!-- Custom js-->
						<script src="js/custom.js"></script>

						<script type="text/javascript">

							if ( window.history.replaceState ) {
								window.history.replaceState( null, null, window.location.href );
							}
						</script>

					</body>
					</html>
				<?php } 
				else{
					header("location:dashboard.php");
				}
				?>

