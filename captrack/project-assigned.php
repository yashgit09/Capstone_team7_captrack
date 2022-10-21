<?php
ob_start();
session_start();
include"admin/conn.php";
if(isset($_SESSION['id']))
{

date_default_timezone_set("Canada/Eastern");

$present_date=date("Y-m-d");

if(isset($_POST['OnHold']))
{
$id2=$_POST['id'];

$sql2 = $conn->prepare("UPDATE projects set status='OnHold' where id='".$id2."' AND employee_id='".$_SESSION['id']."' ");
$sql2->execute();  
$_SESSION['leaves1']="<div class='alert alert-success'><center>Status Update Successfully.</center></div>";
}

if(isset($_POST['Completed']))
{
$id3=$_POST['id'];
$deadline=$_POST['date'];

// if($deadline>=$present_date)
// {
//   $sql31 = $conn->prepare("UPDATE registration set points=points+100 where id='".$_SESSION['id']."' "); 
//   $sql31->execute();  
// 	//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
// }

$sql3 = $conn->prepare("UPDATE projects set status='Approval_req' where id='".$id3."' AND employee_id='".$_SESSION['id']."' "); 
$sql3->execute();  
$_SESSION['leaves1']="<div class='alert alert-success'><center>Status Update Successfully.</center></div>";
}

if(isset($_POST['Active']))
{
$id3=$_POST['id'];
$sql3 = $conn->prepare("UPDATE projects set status='Active' where id='".$id3."' AND employee_id='".$_SESSION['id']."' "); 
$sql3->execute();
$_SESSION['leaves1']="<div class='alert alert-success'><center>Status Update Successfully.</center></div>";
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
		
		<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
		
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

                        
	<!--Page header-->
						<div class="page-header d-xl-flex d-block">
							<div class="page-leftheader">
								<h4 class="page-title">Project List</h4>
							</div>
							
						</div>
						<!--End Page header-->

					
						<!-- Row -->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<h4 class="card-title">Project Assigned To Me </h4>
									</div>
								
									<div class="card-body">
										<div class="table-responsive recent_jobs p-0 card-body">
													<table class="table mg-b-0 text-nowrap">
														<tbody>
					<?php
                      $i = 1;
                      $sql = $conn->prepare("SELECT * FROM projects where employee_id='".$_SESSION['id']."'");
                      $sql->execute();
                      $result = $sql->fetchAll(PDO::FETCH_OBJ);
                      foreach($result as $data)
                      {
                     
                    ?>
                  
															<tr class="border-bottom">
																<td>
																	<div class="d-flex">
																		
																		<div class="mr-3 mt-0 mt-sm-2 d-block">
																			<h6 class="mb-0 fs-13 font-weight-semibold"><?php echo $data->projectname;?></h6>
																			<div class="clearfix"></div>
																			
																		</div>
																	</div>
																</td>

																<td class="text-left fs-13 text-muted"><span class="badge badge-success">Assign:  <?= $data->start_date; ?>, <?= $data->time; ?></span><br><span class="badge badge-warning">Deadline: <?=  $data->deadline; ?></span> </td>
																
                                                                <?php if($data->status=='Active'){ ?>
																<td class="text-left"><span class="task-btn border-success text-success"><?= $data->status; ?></span></td>
															<?php } if($data->status=='OnHold') { ?>
																<td class="text-left"><span class="task-btn border-orange text-orange"><?= $data->status; ?></span></td>
															<?php } if($data->status=='Approval_req') { ?>
																<td class="text-left"><span class="task-btn border-orange text-orange">Awaiting Approval</span></td>
															<?php } if($data->status=='Completed'){ ?>
																<td class="text-left"><span class="task-btn border-success text-success"><?= $data->status; ?></span></td>
															<?php } ?>
																<td class="text-left d-flex">
																	<a href="project-view.php?id=<?php echo $data->id;?>" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye primary text-primary"></i></a>
																	
																	<?php if($data->status=='Active'){ ?>
																																
																	
																
																	<form method="post">
																	<input type="hidden" name="id" value="<?php echo $data->id; ?>">

																	<input type="hidden" name="date" value="<?php echo $data->deadline; ?>">
																	<button name="Completed" class="action-btns1" type="submit" value="Completed" title="Move to Complete (Ask For Approval)"><i class="feather feather-send success text-success"></i></button>
																	</form>
																	<?php } elseif ($data->status=='OnHold') { ?>
																		
																	<?php } ?>
																
																</td>
															</tr>
															<?php $i++;}?>
														</tbody>
													</table>
												</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-->


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
			<!-- INTERNAL Index js-->
		<script src="js/emp-attendance.js"></script>
	

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
header("location:attendance.php");
}
?>


