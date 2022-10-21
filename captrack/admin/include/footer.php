<?php 
include "../admin/conn.php";
//session_start();
if(isset($_POST['submit']))
{
//$id = $_GET['id'];
$pass = stripslashes($_POST['pass']); 
$currentpass = stripslashes($_POST['currentpass']);
$pass1 = stripslashes($pass);
$currentpass1 = stripslashes($currentpass);
$s=$conn->prepare("SELECT * FROM adminlogin where id='".$_SESSION['id']."' AND password='".$currentpass1."'");
$s->execute();
$count = $s->rowCount();

if($count>0)
{

$sql1= $conn->prepare("UPDATE adminlogin SET password =? where id='".$_SESSION['id']."'");
$sql1->execute([$pass1]) or die("Earror");
	

unset($_SESSION['id']);
header("location:../index.php");
$_SESSION['changmsg']="<div class='alert alert-success'><center>Password Updated.</center></div>";
}
else
{ 
 $_SESSION['c22']="<div class='alert alert-success'><center>Old Password Is Wrong.</center></div>";
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

	</head>

	<body class="app sidebar-mini" id="index1">
            <!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Captrack 
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

           

			<!--Change password Modal -->
			<div class="modal fade" id="changepasswordnmodal">
				<div class="modal-dialog" role="document">
					<form id="changepass-form11" method="post" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Change Password</h5>
							<button class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Current Password</label>
								<input type="password" class="form-control" placeholder="Current Password" name="currentpass" id="currentpass">
							</div>
							<div class="form-group">
								<label class="form-label">New Password</label>
								<input type="password" class="form-control" placeholder="New Password" name="pass" id="pass">
							</div>

							<div class="form-group">
								<label class="form-label">Confirm Password</label>
								<input type="password" class="form-control" placeholder="Confirm Password" name="cpass" id="cpass">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<!-- <a href="#" class="btn btn-primary">Confirm</a> -->
							<button type="submit" class="btn btn-primary" name="submit">Confirm</button>
						</div>
					</div>
				</form>
				</div>
			</div>
			<!-- End Change password Modal  -->

		
<script>

  
    $.validator.addMethod("pass_regex", function(value, element) {
        return this.optional(element) || /^[0-9a-z@!#$&*A-Z]{6,}$/i.test(value);
        }, "Please choose a valid number.");


  $("#changepass-form11").validate(
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