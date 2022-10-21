<?php
session_start();
include"admin/conn.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['update']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$phone = $_POST['phone'];
$designation = $_POST['designation'];

$presentaddress = $_POST['presentaddress'];

$pincode = $_POST['pincode'];
$country = $_POST['country'];


$sql3 = $conn->prepare("SELECT * FROM registration WHERE id='".$_SESSION['id']."'");
$sql3->execute();
$res3 = $sql3->fetch(PDO::FETCH_ASSOC);
$oldImg = $res3['image'];
if($_FILES['image']['name'])
{
$img_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$path = "images/";
$image = uniqid().$img_name;
move_uploaded_file($tmp_name,$path.$image);
unlink("images/".$oldImg);
}
else{
$image = $oldImg;
}

$sql = $conn->prepare("UPDATE registration SET fname =?,lname =?,phone =?,designation =?,present_address =?,image =? where id='".$_SESSION['id']."'");
if($sql->execute([$fname,$lname,$phone,$designation,$presentaddress,$image]))
{
//header("location:setting.php?msg=1");
$_SESSION['upmsg']="<div class='alert alert-success'><center>Update Your Profile Successfully.</center></div>";
}
}


if(isset($_POST['submit']))
{
//$id = $_GET['id'];
$pass = stripslashes($_POST['pass']); 
$currentpass = stripslashes($_POST['currentpass']);
$pass1 = stripslashes($pass);
$currentpass1 = stripslashes($currentpass);
$s=$conn->prepare("SELECT * FROM registration where id='".$_SESSION['id']."' AND password='".$currentpass1."'");
$s->execute();
$count = $s->rowCount();

if($count>0)
{
$sql1= $conn->prepare("UPDATE registration SET password =? where id='".$_SESSION['id']."'");
$sql1->execute([$pass1]) or die("Earror");
	
unset($_SESSION['id']);
header("location:index.php");
$_SESSION['changmsg']="<div class='alert alert-success'><center>Password Updated.</center></div>";
}
else
{ 
 $_SESSION['c21']="<div class='alert alert-success'><center>Old Password Is Wrong.</center></div>";
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
                        <?php
                            if (isset($_SESSION['upmsg'])) {
                            echo $_SESSION['upmsg'];
                            
                            }
                            unset ($_SESSION["upmsg"]);
                        ?>

                        <?php
                            if (isset($_SESSION['c21'])) {
                            echo $_SESSION['c21'];
                            
                            }
                            unset ($_SESSION["c21"]);
                        ?>
						<div class="page-header d-lg-flex d-block">
							<div class="page-leftheader">
								<h4 class="page-title">Edit profile</h4>
							</div>
							
						</div>
						<!--End Page header-->

						<!-- Row -->
						<div class="row">
							<div class="col-xl-4 col-lg-5">
								<form id="changepass-form1" method="post" autocomplete="off">
								<div class="card">
									<div class="card-header border-bottom-0">
										<div class="card-title">Edit Password</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="form-label">Current Password</label>
											<input type="password" class="form-control" placeholder="Current Password" name="currentpass" id="currentpass">
										</div>
										<div class="form-group">
											<label class="form-label">New Password</label>
											<input type="password" class="form-control"  placeholder="New Password" name="pass" id="pass">
										</div>
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="password" class="form-control" placeholder="Confirm Password" name="cpass" id="cpass">
										</div>
									</div>
									<div class="card-footer text-right">
										<!-- <a href="#" class="btn btn-primary">Update</a> -->
										<button type="submit" class="btn btn-primary" name="submit">Update</button>
										<a href="#" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							</form>
							</div>
	<?php
      $i = 1;
      //$id=$_GET['id'];
      $sql2 = $conn->prepare("SELECT * FROM registration where id='".$_SESSION['id']."'");
      $sql2->execute();
      $result2 = $sql2->fetch(PDO::FETCH_OBJ);                
    ?>
							<div class="col-xl-8 col-lg-7">
								<form method="POST" enctype="multipart/form-data" autocomplete="off">
								<div class="card">
									<div class="card-body">
										<div class="card-title">Basic info:</div>
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $result2->fname; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $result2->lname; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" readonly="" placeholder="Email" name="" value="<?php echo $result2->email; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Phone Number</label>
													<input type="number" class="form-control" placeholder="Number" name="phone" value="<?php echo $result2->phone; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Designation</label>
													<input type="text" class="form-control" placeholder="Designation" name="designation" value="<?php echo $result2->designation; ?>">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Present Address</label>
													<input type="text" class="form-control" placeholder="Present Address" name="presentaddress" value="<?php echo $result2->present_address; ?>">
												</div>
											</div>
											
											
											
										</div>
										
										<div class="card-title font-weight-bold mt-5">About:</div>
										
									
										<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Profile Picture</label>
													<input class="form-control" name="image" value="" type="file">
                                                   <img width="50" src="images/<?php echo $result2->image;?>">
												</div>
											</div>
									</div>
									<div class="card-footer text-right">
										<!-- <a href="#" class="btn btn-lg btn-primary">Update</a> -->
										<button type="submit" class="btn btn-lg btn-primary" name="update">Update</button>
										<a href="#" class="btn btn-lg btn-danger">Cancel</a>
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
		<script src="js/index2.js"></script>
		<script src="js/emp-sidemenuchart.js"></script>

		<!-- Custom js-->
		<script src="js/custom.js"></script>

    <script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
					<script>

  
    $.validator.addMethod("pass_regex", function(value, element) {
        return this.optional(element) || /^[0-9a-z@!#$&*A-Z]{6,}$/i.test(value);
        }, "Please choose a valid number.");


  $("#changepass-form1").validate(
  {
    errorElement: 'div',
    errorClass: 'help-inline',
    rules: {

       currentpass:{
        required: true,
      },

       pass:{
        required: true,
        pass_regex: true
      },

      cpass:{
        required: true,
        equalTo: '#pass'
      }
    },
    messages: {
     
      currentpass:{
        required:"Current Password Is Required",
        pass_regex:"Password Is Not Valid"
      },

      pass:{
        required:"New Password Is Required",
        pass_regex:"Password Is Not Valid"
      },

      cpass:{
        required:"Confirm-Password Is Required",
        equalTo:"Password Not Match"
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
header("location:edit-profile.php");
}
?>


