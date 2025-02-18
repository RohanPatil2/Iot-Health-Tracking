<?php
$page = "Feedback";
include_once("./adders/header.php");

$doctors = json_decode(select_query($con, "*", "user_master", "enabled='1' AND category='1'", "", "", ""));

$selectedDoctor = $selectedDoctorErr = $feedback = $feedbackErr = "";

if (isset($_POST['subForm'])) {
	$selectedDoctor = isset($_POST['selectedDoctor']) && trim($_POST['selectedDoctor'] != '') ? mysqli_real_escape_string($con, trim($_POST['selectedDoctor'])) : '';
	$feedback = isset($_POST['feedback']) && trim($_POST['feedback'] != '') ? mysqli_real_escape_string($con, trim($_POST['feedback'])) : '';

	if ($selectedDoctor == '')
		$selectedDoctorErr = "Doctor name is required";

	if ($feedback == '')
		$feedbackErr = "Feedback is required";


	if ($selectedDoctorErr == '' && $feedbackErr == '') {
		$insertedFeedback = json_decode(insert_query($con, array('uid', 'doctorId', 'feedback', 'createdBy'), array($_SESSION['uid'], $selectedDoctor, $feedback, $_SESSION['uid']), "feedback_master"));

		if ($insertedFeedback) {
			echo '<script>swal({title: "Feedback submitted successfully",type: "success",button: "Ok"}).then(function() {window.location.href = "feedback.php";});</script>';
		} else {
			echo '<script>swal({title: "Something went wrong",type: "error",button: "Ok"});</script>';
		}
	}
}
?>
<!--Container Main start-->
<div class="m-3">
	<div class="row">
		<h4 class="text-uppercase"><?php echo $page; ?></h4>
	</div>
</div>

<div class="container pt-3">
	<h6>Submit your feeback here</h6>
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<select class="custom-select custom-select-sm" name="selectedDoctor">
						<option selected disabled>Select Doctor</option>
						<?php
						foreach ($doctors as $doctor) { ?>
							<option value="<?php echo $doctor->id; ?>" <?php echo $selectedDoctor != "" && $selectedDoctor == $doctor->id  ? 'selected' : ""; ?>><?php echo $doctor->firstName . " " . $doctor->lastname; ?></option>
						<?php } ?>
					</select>
					<?php echo isset($selectedDoctorErr) && $selectedDoctorErr != '' ? '<small class="text-danger">' . $selectedDoctorErr . '</small>' : ''; ?>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<textarea name="feedback" rows="3" class="form-control form-control-sm" placeholder="Please enter detailed feedback"></textarea>
					<?php echo isset($feedbackErr) && $feedbackErr != '' ? '<small class="text-danger">' . $feedbackErr . '</small>' : ''; ?>
				</div>
			</div>
		</div>
		<div class="row my-2">
			<div class="col-md-8">
				<button type="submit" name="subForm" class="btn btn-outline-primary btn-sm">Save</button>
			</div>
		</div>
	</form>
</div>
<?php
include_once('./adders/footer.php');
?>