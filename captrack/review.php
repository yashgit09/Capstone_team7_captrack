<?php
session_start();
include"admin/conn.php";
if(isset($_POST['submit']))
{
	date_default_timezone_set("Asia/Kolkata");
	
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];

	$total=$q1+$q2+$q3+$q4+$q5;

    $employeeid = $_POST['employeeid'];
	$startdate = $_POST['startdate'];


$sql2 = $conn->prepare("UPDATE registration set last_reviewed_on = ?, points=points+'".$total."' where id='".$employeeid."' ");
  
	if($sql2->execute([$startdate]))
	{
		$_SESSION['review']="<div class='alert alert-success'><center>Reviewed Successfully.</center></div>";

	}
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

	<!-- INTERNAl Summernote css -->
	<link rel="stylesheet" href="css/summernote-bs4.css">

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

					<!--Page header--><?php
					if (isset($_SESSION['review'])) {
						echo $_SESSION['review'];

					}
					unset ($_SESSION["review"]);
					?>
					<div class="page-header d-xl-flex d-block">
						<div class="page-leftheader">
							<h4 class="page-title">Review</h4>
						</div>

					</div>
					<!--End Page header-->

					<!-- Row -->
					<div class="row" style="display: block;">
						<form id="freeform1" method="POST" enctype="multipart/form-data" autocomplete="off">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-body">
										
										<div class="form-group">
											<label class="form-label">Review Employee:</label>
											<select name="employeeid"  class="form-control custom-select select2" data-placeholder="Select Employee" id="employeeid" required="">
												<option label="Select Employee"></option>
												<?php
												$i = 1;
												$sql11 = $conn->prepare("SELECT * FROM registration Where STATUS='Active' AND manager='".$_SESSION['employee_id']."' ORDER BY id ASC");
												$sql11->execute();
												$result11 = $sql11->fetchAll(PDO::FETCH_OBJ);
												foreach($result11 as $data11)
												{
													?>
													<option value="<?=$data11->id;?>"><?=$data11->fname;?> <?=$data11->lname;?></option>
													<?php $i++;}?>

												</select>
											</div>

											<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Q1 Goals meet by employee? :</label>
													<input type="radio" name="q1" value="10" id="projectname">Very Satisfied<br>
													<input type="radio" name="q1" value="5" id="projectname">Satisfied<br>
													<input type="radio" name="q1" value="3" id="projectname">Neutral<br>
													<input type="radio" name="q1" value="2" id="projectname">Disatisfied<br>
													<input type="radio" name="q1" value="1" id="projectname">Very Disatisfied
												</div>
											</div>
										    </div>

										    <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Q2 Motivated to do the job? :</label>
													<input type="radio" name="q2" value="10" id="projectname">Very Satisfied<br>
													<input type="radio" name="q2" value="5" id="projectname">Satisfied<br>
													<input type="radio" name="q2" value="3" id="projectname">Neutral<br>
													<input type="radio" name="q2" value="2" id="projectname">Disatisfied<br>
													<input type="radio" name="q2" value="1" id="projectname">Very Disatisfied
												</div>
											</div>
										    </div>

										    <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Q3 Goals meet on time? :</label>
													<input type="radio" name="q3" value="10" id="projectname">Very Satisfied<br>
													<input type="radio" name="q3" value="5" id="projectname">Satisfied<br>
													<input type="radio" name="q3" value="3" id="projectname">Neutral<br>
													<input type="radio" name="q3" value="2" id="projectname">Disatisfied<br>
													<input type="radio" name="q3" value="1" id="projectname">Very Disatisfied
												</div>
											</div>
										    </div>


										    <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Q4 Training completed? :</label>
													<input type="radio" name="q4" value="10" id="projectname">Very Satisfied<br>
													<input type="radio" name="q4" value="5" id="projectname">Satisfied<br>
													<input type="radio" name="q4" value="3" id="projectname">Neutral<br>
													<input type="radio" name="q4" value="2" id="projectname">Disatisfied<br>
													<input type="radio" name="q4" value="1" id="projectname">Very Disatisfied
												</div>
											</div>
										    </div>


										    <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Q5 Defect free deliveries :</label>
													<input type="radio" name="q5" value="10" id="projectname">Very Satisfied<br>
													<input type="radio" name="q5" value="5" id="projectname">Satisfied<br>
													<input type="radio" name="q5" value="3" id="projectname">Neutral<br>
													<input type="radio" name="q5" value="2" id="projectname">Disatisfied<br>
													<input type="radio" name="q5" value="1" id="projectname">Very Disatisfied
												</div>
											</div>
										    </div>

										
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="form-label">Date:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text">
																	<i class="feather feather-calendar"></i>
																</div>
															</div><input class="form-control fc-datepicker" placeholder="DD-MM-YYY" type="date" name="startdate" id="startdate" required="">
														</div>
													</div>
												</div>

											</div>
											
										
										</div>
									</div>

									<div class="card-footer text-right">

										<!-- <a href="#" class="btn btn-success btn-lg" onclick="not1()">Submit</a> -->
										<input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg">
									</div>
								</div>
							</form>
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


	<script src="js/summernote-bs4.js"></script>
	<script src="js/project-new.js"></script>
	<script src="js/project-sidemenuchart.js"></script>

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
	<script>
		CKEDITOR.replace( 'description' );

	</script>

	<script type="text/javascript">
		function fileValidation()
		{
			var fileInput = document.getElementById('file');
			var filePath = fileInput.value;
			var allowedExtensions = /(\.pdf|\.doc|\.txt|\.docx)$/i;
			if(!allowedExtensions.exec(filePath))
			{
				alert('Please upload only .pdf/.doc/.docx file.');
				fileInput.value = '';
				return false;
			}
		}
	</script>

<script type="text/javascript">

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>



