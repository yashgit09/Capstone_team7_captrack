<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['delete'])) {
$id = $_POST['id'];
$sql3 = $conn->prepare("SELECT * FROM products WHERE id = '".$id."'");
$sql3->execute();
$row=$sql3->fetch(PDO::FETCH_OBJ);
$img = $row->image;

$file = "../images/".$img;
unlink($file);

$sql = $conn->prepare("DELETE FROM `products` WHERE id='".$id."'");
if($sql->execute())
{
$_SESSION['emmsg']="<div class='alert alert-success'><center>Delete Successfully.</center></div>";
}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

	<title>Product List | Captrack</title>
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
                  if (isset($_SESSION['emmsg'])) {
                  echo $_SESSION['emmsg'];
                  
                  }
                  unset ($_SESSION["emmsg"]);
                ?>
					<!--Page header-->
						<div class="page-header d-xl-flex d-block">
							<div class="page-leftheader">
								<h4 class="page-title">Product List</h4>
							</div>
							<div class="page-rightheader ml-md-auto">
								<div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
									<div class="btn-list">
										
									</div>
								</div>
							</div>
						</div>
						<!--End Page header-->
                
						<!-- Row-->
						<div class="row">
							
						</div>
						<!-- End Row -->

						<!-- Row -->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<!-- <div class="card-header  border-0">
										<h4 class="card-title">Employees List</h4>
									</div> -->
									<div class="card-body">
										<div class="table-responsive">
											<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
												<thead>
													<tr>
														<th class="border-bottom-0 w-5">No</th>
														<th class="border-bottom-0">Name</th>
														<th class="border-bottom-0">Price</th>
														<th class="border-bottom-0">Image</th>
														
														<th class="border-bottom-0">Actions</th>
													</tr>
												</thead>
												<tbody>
					<?php
                      $i = 1;
                      $sql = $conn->prepare("SELECT * FROM products ");
                      $sql->execute();
                      $result = $sql->fetchAll(PDO::FETCH_OBJ);
                      foreach($result as $data)
                      {
                      
                    ?>
													<tr>
														<td><?= $i; ?></td>
														<td>
															<div class="d-flex">
																
																<div class="mr-3 mt-0 mt-sm-1 d-block">
																	<h6 class="mb-1 fs-14"><?= $data->product; ?></h6>
																	
																</div>
															</div>
														</td>
														<td><?= $data->price; ?></td>
														<td><span class=""><img height="80" width="90" src="../images/<?= $data->image; ?>"></span></td>
													
														<td>
															<a class="btn btn-primary btn-icon btn-sm"  href="update-product.php?id=<?php echo $data->id;?>">
																<i class="feather feather-edit" data-toggle="tooltip" data-original-title="View/Edit"></i>
															</a>
															<!-- <a class="btn btn-danger btn-icon btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="feather feather-trash-2"></i></a> -->
															<form method="post" action="" style="display: inline-block">
                                                     <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                                                     <button class="btn btn-danger btn-icon btn-sm" title="Delete" type="submit" name="delete" onClick="return confirm('Are you sure you want to delete?')"><i class="feather feather-trash-2"></i></button>
                                                    </form>
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
      
</script>

</body>
</html>
<?php } 
else{
header("location:employee-list.php");
}
?>