<?php
session_start();
include"conn.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['submit']))
{
date_default_timezone_set("Canada/Eastern");
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$phone = $_POST['phone'];
$manager = $_POST['manager'];
$presentaddress = $_POST['presentaddress'];
$permanentaddress = $_POST['permanentaddress'];
$city = $_POST['city'];

$department = $_POST['department'];
$designation = $_POST['designation'];
$shift = $_POST['shift'];
$doj = $_POST['doj'];
$regdate = $_POST['regdate'];

$salarytype = $_POST['salarytype'];
$salary = $_POST['salary'];
$status = $_POST['status'];
$accountholder = $_POST['accountholder'];
$accountnumber = $_POST['accountnumber'];
$bankname = $_POST['bankname'];


$initail1 = mb_substr($fname, 0, 1);
$initail2 = mb_substr($lname, 0, 1);
$rand = substr(md5(time()), 0, 5);
$email = $initail1.$initail2.$rand."@captrack.com";

$str_result = $initail1.$initail2.'0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$password=substr(str_shuffle($str_result),0,6);

$employeeid = strtoupper($initail1).strtoupper($initail2).$rand;


if($_FILES['image']['name'])
{
$img_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$path = "../images/";
$image = uniqid().$img_name;
move_uploaded_file($tmp_name,$path.$image);
} 

if($_FILES['image1']['name'])
{
$img_name1 = $_FILES['image1']['name'];
$tmp_name1 = $_FILES['image1']['tmp_name'];
$path1 = "../resume/";
$image1 = uniqid().$img_name1;
move_uploaded_file($tmp_name1,$path1.$image1);
} 

if($_FILES['image2']['name'])
{
$img_name2 = $_FILES['image2']['name'];
$tmp_name2 = $_FILES['image2']['tmp_name'];
$path2 = "../resume/";
$image2 = uniqid().$img_name2;
move_uploaded_file($tmp_name2,$path2.$image2);
} 

if($_FILES['image3']['name'])
{
$img_name3 = $_FILES['image3']['name'];
$tmp_name3 = $_FILES['image3']['tmp_name'];
$path3 = "../resume/";
$image3 = uniqid().$img_name3;
move_uploaded_file($tmp_name3,$path3.$image3);
} 

if($_FILES['image4']['name'])
{
$img_name4 = $_FILES['image4']['name'];
$tmp_name4 = $_FILES['image4']['tmp_name'];
$path4 = "../resume/";
$image4 = uniqid().$img_name4;
move_uploaded_file($tmp_name4,$path4.$image4);
} 


if($_FILES['image6']['name'])
{
$img_name6 = $_FILES['image6']['name'];
$tmp_name6 = $_FILES['image6']['tmp_name'];
$path6 = "../resume/";
$image6 = uniqid().$img_name6;
move_uploaded_file($tmp_name6,$path6.$image6);
} 

$sql2 = $conn->prepare("INSERT INTO registration(fname,lname,phone,manager,present_address,permanent_address,image,email,password,employee_id,department,designation,shift_schedule,date_of_joining,resignation_date,salary_type,salary,status,account_holder,account_number,bank_name,resume,id_proof,offer_letter,joining_letter,experience_letter,time) VALUES('".$fname."','".$lname."','".$phone."','".$manager."','".$presentaddress."','".$permanentaddress."','".$image."','".$email."','".$password."','".$employeeid."','".$department."','".$designation."','".$shift."','".$doj."','".$regdate."','".$salarytype."','".$salary."','".$status."','".$accountholder."','".$accountnumber."','".$bankname."','".$image1."','".$image2."','".$image3."','".$image4."','".$image6."','".$time."') ");
if($sql2->execute())
{
$_SESSION['freemsg11']="<div class='alert alert-success'><center>Thanks For Submitting.</center></div>";

}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

	<title>Employee Profile | Captrack</title>
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
							<h4 class="page-title">Employee Profile</h4>
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
										<li class="ml-4"><a href="#tab5" class="active"  data-toggle="tab">Personal Details</a></li>
										<li><a href="#tab6"  data-toggle="tab">Company Details</a></li>
										<li><a href="#tab7" data-toggle="tab">Bank Details</a></li>
										<li><a href="#tab8" data-toggle="tab">Upload Documents</a></li>
									</ul>
								</div>
							</div>
							<form id="freeform1" method="POST" enctype="multipart/form-data" autocomplete="off">
							<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
								<div class="tab-content">
									<div class="tab-pane active" id="tab5">
										<div class="card-body">
											<h4 class="mb-4 font-weight-bold">Basic</h4>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">User Name</label>
													</div>
													<div class="col-md-9">
														<div class="row">
															<div class="col-md-6">
																<input type="text" class="form-control mb-md-0 mb-5"  placeholder="First Name" name="fname" id="fname">
																<span class="text-muted"></span>
															</div>
															<div class="col-md-6">
																<input type="text" class="form-control"  placeholder="Last Name" name="lname" id="lname">
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Contact Number</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Phone Number" name="phone" id="phone">
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Manager</label>
													</div>
													<div class="col-md-9">
														<select class="form-control custom-select select2" data-placeholder="Select" name="manager" id="manager">
															<option label="Select">Select</option>
															<?php
                      
                      $sql = $conn->prepare("SELECT * FROM registration ORDER BY id ASC");
                      $sql->execute();
                      $result = $sql->fetchAll(PDO::FETCH_OBJ);
                      foreach($result as $data)
                      {
                      
                     
                    ?>
															<option value="<?= $data->employee_id; ?>"><?= $data->fname; ?> <?= $data->lname; ?></option>
															<?php $i++;}?>
														</select>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Present Address</label>
													</div>
													<div class="col-md-9">
														<textarea rows="3" class="form-control" placeholder="Address1" name="presentaddress" id="presentaddress"></textarea>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Permanent Address</label>
													</div>
													<div class="col-md-9">
														<textarea rows="3" class="form-control" placeholder="Address2" name="permanentaddress" id="permanentaddress"></textarea>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">City</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="City" name="city" id="city">
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
									<div class="tab-pane" id="tab6">
										<div class="card-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Employee ID</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" readonly=""  placeholder="#ID" name="" id="">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Email</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  readonly=""  placeholder="" name="" id="">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Password</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" readonly=""  placeholder="" name="" id="">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Department</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Department" name="department" id="department">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Designation</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Designation" name="designation" id="designation">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Shift Schedule</label>
													</div>
													<div class="col-md-9">
														<select name="shift"  class="form-control custom-select select2" data-placeholder="Select Type" id="shift">
															<option label="Select Type"></option>
															<option value="Day">Day</option>
															<option value="Evening">Evening</option>
															<option value="Night">Night</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Date Of Joining</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control fc-datepicker"  placeholder="DD-MM-YYYY" name="doj" id="doj">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Resignation Date</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control fc-datepicker"  placeholder="DD-MM-YYYY" name="regdate" id="regdate">
													</div>
												</div>
											</div>
									
											<h4 class="mb-5 mt-7 font-weight-bold">Salary</h4>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Type</label>
													</div>
													<div class="col-md-9">
														<select class="form-control custom-select select2" data-placeholder="Select Type" name="salarytype" id="salarytype">
															<option label="Select Type"></option>
															<option value="Full-Time">Full-Time</option>
															<option value="Part-Time">Part-Time</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Salary</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="$Salary" name="salary" id="salary">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Status</label>
													</div>
													<div class="col-md-9">
														<select name="status"  class="form-control custom-select select2" data-placeholder="Select Status" id="status">
															
															<option value="Active">Active</option>
															<option value="Inactive">Inactive</option>
															
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab7">
										<div class="card-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Account Holder</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Naame" name="accountholder" id="accountholder">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Account Number</label>
													</div>
													<div class="col-md-9">
														<input type="number" class="form-control"  placeholder="Number" name="accountnumber" id="accountnumber">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label mb-0 mt-2">Bank Name</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Name" name="bankname" id="bankname">
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<div class="tab-pane" id="tab8">
										<div class="card-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">Resume</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-light">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image1" id="file1">
																</span>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">ID Proof</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-light">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image2" id="file2">
																</span>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">Offer Letter</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-light">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image3" id="file3">
																</span>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">Joining Letter</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-light">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image4" id="image4">
																</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<div class="form-label mb-0 mt-2">Experience Letter</div>
													</div>
													<div class="col-md-9">
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly>
															<label class="input-group-append mb-0">
																<span class="btn ripple btn-light">
																	Browse <input type="file" class="file-browserinput"  style="display: none;" name="image6" id="file6">
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
        return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
        }, "Please choose a name with only a-z 0-9.");

        $.validator.addMethod("phone_regex", function(value, element) {
        return this.optional(element) || /^[0-9]{1}[0-9]{9}$/i.test(value);
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

       fname:{
        required: true,
        name_regex: true                   
      },

       lname:{
        required: true,
        name_regex: true                   
      },

      
      phone:{
        required: true,
        phone_regex: true,
      },

      manager:{
        required: true,                  
      },

      presentaddress:{
        required: true,                  
      },

      permanentaddress:{
        required: true,                  
      },

      
      image:{
        required: true,                  
      },

      
    },
    
    messages: {

 
      email:{
        required:"Email is Required",
        email_regex:"Email Is Not Valid",
        remote:"This Email Is Already Registered"
      },
      
      fname:{
      required: "First Name Is Required",
      name_regex:"Name Is Not Valid "
      },

      lname:{
      required: "Last Name Is Required",
      name_regex:"Name Is Not Valid "
      },

     
      phone:{
        required:"Contact Number is Required",
        phone_regex:"Number Is Not Valid",
      },

     
      manager:{
      required: " Manager Is Required"
      },

      presentaddress:{
      required: " Present Address Is Required"
      },

      permanentaddress:{
      required: " Permanent Address Is Required"
      },

     
      image:{
      required: " Image Is Required"
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
header("location:employee-profile.php");
}
?>