<?php
session_start();
include"conn.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['submit']))
{
date_default_timezone_set("Canada/Eastern");
$name = $_POST['name'];
$price = $_POST['price'];


if($_FILES['image']['name'])
{
$img_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$path = "../images/";
$image = uniqid().$img_name;
move_uploaded_file($tmp_name,$path.$image);
} 


$sql2 = $conn->prepare("INSERT INTO products(product,price,image) VALUES('".$name."','".$price."','".$image."') ");
if($sql2->execute())
{
$_SESSION['freemsg11']="<div class='alert alert-success'><center>Thanks For Submitting.</center></div>";

}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

	<title>Add Product | Captrack</title>
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


                       
					<!--Page header-->
					<div class="page-header d-xl-flex d-block">
						
						<div class="page-leftheader">
							<h4 class="page-title">Add Product</h4>
						</div>
						
						<div class="page-rightheader ml-md-auto">
							<div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
								<div class="btn-list">
									
								</div>
							</div>
						</div>
					</div>
					<!--End Page header-->

					<!-- Row -->
					<div class="row">
						

						<div class="col-xl-10 col-md-12 col-lg-12 offset-lg-1">
						<?php
                            if (isset($_SESSION['freemsg11'])) {
                            echo $_SESSION['freemsg11'];
                            
                            }
                            unset ($_SESSION["freemsg11"]);
                        ?>
							<div class="tab-menu-heading hremp-tabs p-0 ">
								<div class="tabs-menu1">
									<!-- Tabs -->
									<ul class="nav panel-tabs">
										
									</ul>
								</div>
							</div>
							<form id="freeform1" method="POST" enctype="multipart/form-data" autocomplete="off">
							<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
								<div class="tab-content">
									<div class="tab-pane active" id="tab5">
										<div class="card-body">
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Name</label>
													</div>
													<div class="col-md-9">
														<div class="row">
															<div class="col-md-6">
																<input type="text" class="form-control mb-md-0 mb-5"  placeholder="Name" name="name" id="name">
																<span class="text-muted"></span>
															</div>
														
														</div>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Price</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Price" name="price" id="price">
													</div>
												</div>
											</div>
										
										
										
											
											
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">Upload Photo</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-primary">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image" id="image">
																</span>
															</label>
														</div>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									
									
									
									<div class="card-footer text-right">
										<!-- <a href="#" class="btn btn-primary">Save</a> -->
										<!-- <button type="submit" class="btn btn-primary" name="submit">Save</button> -->
										<input type="submit" name="submit" value="Save" class="btn btn-primary">
										<a href="#" class="btn btn-danger">Cancel</a>
									</div>
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
	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

<script>

        $.validator.addMethod("email_regex", function(value, element) {
        return this.optional(element) || /^([a-z_0-9"]+)([a-z0-9_\+-\."]+)@([a-z0-9_\-\.]+)\.([a-z]{2,5})$/i.test(value);
        }, "The Email Address Is Not Valid Or In The Wrong Format");

       
        $.validator.addMethod("name_regex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9 ]{2,100}$/i.test(value);
        }, "Please choose a name with only a-z 0-9.");

        $.validator.addMethod("phone_regex", function(value, element) {
        return this.optional(element) || /^[0-9]{1,50}$/i.test(value);
        }, "Please choose a valid number.");

        $.validator.addMethod("pass_regex", function(value, element) {
        return this.optional(element) || /^[0-9a-z@!#$&*A-Z]{6,}$/i.test(value);
        }, "Please choose a valid number.");


       
        $("#freeform1").validate({
                errorElement: 'div',
        errorClass: 'help-inline',
            
        rules: {

       email:{
        required: true,
        email_regex: true,
        remote: {
        url:"validatorAjax.php",
        type:"POST"
      }
      },

       name:{
        required: true,
        name_regex: true                   
      },

      
      price:{
        required: true,
        phone_regex: true,
      },

      
      image:{
        required: true,                  
      }
      
    },
    
    messages: {

 
      email:{
        required:"Email is Required",
        email_regex:"Email Is Not Valid",
        remote:"This Email Is Already Registered"
      },
      
      name:{
      required: "Name Is Required",
      name_regex:"Name Is Not Valid "
      },

      price:{
        required:"Price is Required",
        phone_regex:"It Is Not Valid",
      },

      
      image:{
      required: " Image Is Required"
      }

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
header("location:employee-profile.php");
}
?>