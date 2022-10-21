<?php
session_start();
include "admin/conn.php";
if(isset($_SESSION['id']))
{
	

if(isset($_POST['delete']))
{

$cid = $_POST['id'];

$sql21 = $conn->prepare("DELETE FROM `projects` WHERE id='".$cid."' AND project_added_by= '".$_SESSION['id']."' ");
if($sql21->execute())
{
header("location:project-list.php");
}
}
	?>
	<!DOCTYPE html>
	<html lang="en" dir="ltr">
	<head>

		<title>Project View | Captrack</title>
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
						$id=$_GET['id'];
						$sql2 = $conn->prepare("SELECT * FROM projects where id='".$id."'");
						$sql2->execute();
						$result2 = $sql2->fetch(PDO::FETCH_OBJ);   
						$js=$result2->employee_id; 
						           
						?>

						<?php 
						$sth=$conn->prepare("SELECT * FROM registration where id='$js'");
						$sth->execute();
						$category=$sth->fetch(PDO::FETCH_OBJ);
						?>



						<!--Page header-->
						<?php
						if (isset($_SESSION['msgcomment'])) {
							echo $_SESSION['msgcomment'];

						}
						unset ($_SESSION["msgcomment"]);
						?>
						<div class="page-header d-lg-flex d-block">
							<div class="page-leftheader">
								<h4 class="page-title">Project View </h4>
							</div>


							<?php if($result2->project_added_by==$_SESSION['id'] && $result2->status!='Completed'){ ?>
							<div class="page-rightheader">
								

								<form id="commentForm" method="POST" action="" style="display: inline-block">
                                                     <input type="hidden" name="id" value="<?php echo $result2->id; ?>">
                                                     <button class="btn btn-danger" title="Delete" type="submit" name="delete" onClick="return confirm('Are you sure you want to delete?')">Delete Project</button>
                                                    </form>
							</div>
						<?php } ?>

						</div>
						<!--End Page header-->



						<!-- Row -->
						<div class="row">
							<div class="col-xl-4 col-md-12 col-lg-12">
								<div class="card">
								<!-- <div class="card-header  border-0">
									<div class="card-title">Project Details</div>
								</div> -->
								<div class="card-body pt-2 pl-3 pr-3">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<td>
														<span class="w-50">Assigned Team</span>
													</td>
													<td>:</td>
													<td>
														<span class="font-weight-semibold"><?php echo $category->fname;?> <?php echo $category->lname;?></span>
													</td>
												</tr>
												<tr>
													<td>
														<span class="w-50">Project Name</span>
													</td>
													<td>:</td>
													<td>
														<span class="font-weight-semibold"><?php echo $result2->projectname;?></span>
													</td>
												</tr>
												
												
												<tr>
													<td>
														<span class="w-50">Start Date</span>
													</td>
													<td>:</td>
													<td>
														<span class="font-weight-semibold"><?php echo $result2->start_date; ?></span>
													</td>
												</tr>
												<tr>
													<td>
														<span class="w-50">Deadline</span>
													</td>
													<td>:</td>
													<td>
														<span class="font-weight-semibold"><?php echo $result2->deadline; ?></span>
													</td>
												</tr>
												

												
												<tr>
													<td>
														<span class="w-50">Work Status</span>
													</td>
													<td>:</td>
													<td>
														<span class="badge badge-primary"><?php echo $result2->status; ?></span>
													</td>


												</tr>



												<tr>
													


												</tr>


											</tbody>

										</table>
									</div>
								</div>
							</div>
							
						</div>
						<div class="col-xl-8 col-md-12 col-lg-12">
							<div class="tab-menu-heading hremp-tabs p-0 ">
								<div class="tabs-menu1">
									<!-- Tabs -->
									<ul class="nav panel-tabs">
										<li class="ml-4"><a href="#tab5" class="active"  data-toggle="tab">Overview</a></li>
										<!-- <li><a href="#tab6" data-toggle="tab">Tasks</a></li> -->
										<li><a href="#tab7"  data-toggle="tab">Files</a></li>
										<!-- <li><a href="#tab9" data-toggle="tab">Comments</a></li> -->
									</ul>
								</div>
							</div>
							<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
								<div class="tab-content">
									<div class="tab-pane active" id="tab5">
										<div class="card-body">
											<h5 class="mb-4 font-weight-semibold">Description</h5>

											<p><?php echo $result2->description; ?> </p> 
											
										</div>
									</div>

									<div class="tab-pane" id="tab7">
										<div class="card-body">
											<div class="table-responsive">
												<!-- <a href="#" class="btn btn-primary btn-tableview">Upload Files</a> -->
												<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="files-tables">
													<thead>
														<tr>
															<th class="border-bottom-0 text-center w-5">No</th>
															<th class="border-bottom-0">File Name</th>
															<th class="border-bottom-0">Upload By</th>
															<th class="border-bottom-0">Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="text-center">1</td>
															<td>
																<a href="#" class="font-weight-semibold fs-14 mt-5"><?php echo $result2->image; ?><span class="text-muted ml-2"><!-- (2 3 KB) --></span></a>
																<div class="clearfix"></div>
																<!-- <small class="text-muted">2 hours ago</small> -->
															</td>
															<td>Admin</td>
															<td>
																<div class="d-flex">
																	
																	<a href="resume/<?php echo $result2->image; ?>" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Download" target="_blank"><i class="feather feather-download   text-success"></i></a>
																
																<!-- 	<form method="post" action="">
																		<input type="hidden" name="id" value="<?php echo $result2->id; ?>">
																		<button class="action-btns1" title="Delete" type="submit" name="delete" onClick="return confirm('Are you sure you want to delete?')"><i class="feather feather-trash-2 text-danger"></i></button>
																	</form> -->
																</div>
															</td>
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
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

	<!-- Custom js-->
	<script src="js/custom.js"></script>

	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

	<script>

		$.validator.addMethod("email_regex", function(value, element) {
			return this.optional(element) || /^([a-z_0-9"]+)([a-z0-9_\+-\."]+)@([a-z0-9_\-\.]+)\.([a-z]{2,5})$/i.test(value);
		}, "The Email Address Is Not Valid Or In The Wrong Format");


		$.validator.addMethod("name_regex", function(value, element) {
			return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
		}, "Please choose a name with only a-z 0-9.");




		$("#commentForm").validate({
			errorElement: 'div',
			errorClass: 'help-inline',

			rules: {

				name:{
					required: true,
					name_regex: true                   
				},

				message:{
					required: true,                  
				},

			},

			messages: {

				name:{
					required: " Name Is Required",
					name_regex:"Name Is Not Valid "
				},

				message:{
					required: " Message Is Required"
				},    
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
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
	header("location:project-view.php");
}
?>