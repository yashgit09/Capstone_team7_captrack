<?php
ob_start();
//session_start();
include"admin/conn.php";
if(isset($_POST['submit']))
{
    $email = stripslashes($_POST['email']);
    $email1 = stripslashes($email);
    $email11 = str_replace("'", "\'", $email1);

    $sth=$conn->prepare("SELECT * FROM registration where email='$email11' AND status='Active'");

    $sth->execute();
    $row=$sth->fetch(PDO::FETCH_OBJ);
    $c=$sth->rowCount();
    
    if($c==1){
        $id=$row->id;
        $rand= rand(1000,9999);
        $sql = $conn->prepare("UPDATE registration SET otp =? where id='".$row->id."' ");
        if($sql->execute([$rand]))
        {
           header("location:otp.php?id=$id");
        }
    }
   else{
    //header("location:forgot-password.php");
    $_SESSION['formsg']="<div class='alert alert-success'><center>Enter Valid Email.</center></div>";
}
ob_flush();
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

		<div class="page relative error-page3">
			<div class="row no-gutters">
				<div class="col-xl-6 h-100vh">
					<div class="cover-image h-100vh" data-image-src="images/login3.jpg">
						<div class="container">
							<div class="customlogin-imgcontent">
								<h2 class="mb-3 fs-35 text-white">Register Here</h2>
								<p class="text-white-50">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 bg-white h-100vh">
					
					<div class="container">
						<div class="customlogin-content">

						<?php
                            if (isset($_SESSION['formsg'])) {
                            echo $_SESSION['formsg'];
                            
                            }
                          //  unset ($_SESSION["formsg"]);
                        ?>
							
							<div class="p-4 pt-6">
								<!-- <h1 class="mb-2">Forgot Password?</h1> -->
							<!-- 	<p class="text-muted">Enter the email address registered on your account
</p> -->
							</div>
							<form class="card-body pt-3" id="loginform11" method="POST" autocomplete="off">
								<div class="form-group">
									<label class="form-label">First Name</label>
									<input class="form-control" placeholder="Email" type="email" name="email" id="email">
								</div>

								<div class="form-group">
									<label class="form-label">Last Name</label>
									<input class="form-control" placeholder="Email" type="email" name="email" id="email">
								</div>

								<div class="form-group">
									<label class="form-label">Email</label>
									<input class="form-control" placeholder="Email" type="email" name="email" id="email">
								</div>

								<div class="form-group">
									<label class="form-label">Password</label>
									<input class="form-control" placeholder="Email" type="email" name="email" id="email">
								</div>


                                <div class="form-group">
								<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Status</label>
													</div>
													<div class="col-md-9">
														<select name="maritalstatus"  class="form-control custom-select select2" data-placeholder="Select" id="maritalstatus">
															<option label="Select"></option>
															<option value="Manager">Manager</option>
															<option value="Associate">Associate</option>
														</select>
													</div>
												</div>
											</div>
								
								
								<div class="submit">
									<!-- <a class="btn btn-primary btn-block" href="">Submit</a> -->
									<button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
								</div>
							<!-- 	<div class="text-center mt-3">
									<p class="mb-2"><a href="index.php">Send me to Login</a></p>
								
								</div> -->
							</form>
							
						</div>
					</div>
				</div>
			</div>
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

        $("#loginform11").validate({
                errorElement: 'div',
        errorClass: 'help-inline',
            
        rules: {

      email:{
        required: true,
        email_regex: true            
      },

    },
    
    messages: {
           
      email:{
        required:"Email Is Required",
        email_regex:"Email Address Is Not Valid "
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



