<?php
$page = "Profile";
include_once("./adders/header.php");

$first_name = $first_nameErr = $last_name = $last_nameErr =
	$email = $emailErr = $phone = $phoneErr = $address = $addressErr = $address2 = $address2Err =
	$city = $cityErr = $pincode = $pincodeErr = "";


$slots = timeSlots;
$stage = appointmentStages;

$userDetails = json_decode(select_query($con, "*", "user_master", "enabled='1' AND id=" . $_SESSION['uid'], "", "", ""));

if ($_SESSION['category'] == '2')
	$userAppointmentHistory = json_decode(select_query($con, "a.appointmentDate, a.slot, a.status, u.firstName, u.lastname", "appointment_master a JOIN user_master u ON a.doctorId=u.id", "a.uid=" . $_SESSION['uid'], "status ASC", "", ""));

if (!empty($userDetails) && count($userDetails) > 0) {
	$first_name = $userDetails[0]->firstName;
	$last_name = $userDetails[0]->lastname;
	$email = $userDetails[0]->email;
	$phone = $userDetails[0]->phoneNumber;
	$address = $userDetails[0]->addressLine1;
	$address2 = $userDetails[0]->addressLine2;
	$city = $userDetails[0]->city;
	$pincode = $userDetails[0]->pincode;
} else {
	echo '<script>swal({title: "Something went wrong",type: "warning",button: "Ok"}).then(function() {window.location.href = "index.php";});</script>';
}

if (isset($_POST['subForm'])) {

	$first_name = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['first_name'])));
	$last_name = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['last_name'])));
	$phone = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['phone'])));
	$email = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['email'])));
	$address = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['address'])));

	if (!preg_match('/^[a-zA-Z]+[a-zA-Z ]+$/', $first_name))
		$first_nameErr = "Only alphabets and spaces are allowed";

	if (!preg_match('/^[a-zA-Z]+[a-zA-Z ]+$/', $last_name))
		$last_nameErr = "Only alphabets and spaces are allowed";

	if (!preg_match('/^[0-9]{10}+$/', $phone))
		$phoneErr = "Only numbers of 10 digits are allowed";

	if (!preg_match('/^(\w*\s*[\-\,\/\.\(\)\&]*)+$/i', $address))
		$addressErr = "Enter valid address";

	if ($first_name == '')
		$first_nameErr = "First name is required";

	if ($last_name == '')
		$last_nameErr = "Last name is required";

	if ($phone == '')
		$phoneErr = "Phone number is required";

	if ($email == '')
		$emailErr = "Email address is required";

	if ($address == '')
		$addressErr = "Address is required";

	if ($first_nameErr == '' && $last_nameErr == '' && $phoneErr == '' && $emailErr == '' && $addressErr == '') {

		$result = json_decode(update_query($con, "user_master", "first_name='$first_name', last_name='$last_name', phone_number='$phone', email_id='$email', address='$address'", "id=" . $_SESSION['uid']));

		if ($result) {
			$userDetails = json_decode(select_query($con, "*", "user_master", "enabled='1' AND id=" . $_SESSION['uid'], "", "", ""));

			echo '<script>swal({title: "Profile updated successfully",type: "success",button: "Ok"}).then(function() {window.location.href = "profile.php";});</script>';
		}
	}
}

function getBadge($s)
{
	$st = appointmentStages;

	if($s == 1)
	return ' <span class="badge badge-primary">' . $st[($s - 1)] . '</span>';
	if($s == 2)
	return ' <span class="badge badge-success">' . $st[($s - 1)] . '</span>';
	if($s == 3)
	return ' <span class="badge badge-info">' . $st[($s - 1)] . '</span>';
	if($s == 4)
	return ' <span class="badge badge-danger">' . $st[($s - 1)] . '</span>';
}
?>
<!--Container Main start-->
<div class="m-3">
	<div class="row">
		<h4 class="text-uppercase"><?php echo $page; ?></h4>
	</div>
</div>

<div class="container pt-3">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col border-right">
					<form class="form-group" action="" method="post" enctype="multipart/form-data">
						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" placeholder="Enter first name" name="first_name" <?php echo isset($first_name) && $first_name != '' ? 'value="' . $first_name . '"' : ''; ?>>
									<?php echo $first_nameErr != '' ? '<span class="text-danger">' . $first_nameErr . '</span>' : ''; ?>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" placeholder="Enter last name" name="last_name" <?php echo isset($last_name) && $last_name != '' ? 'value="' . $last_name . '"' : ''; ?>>
									<?php echo $last_nameErr != '' ? '<span class="text-danger">' . $last_nameErr . '</span>' : ''; ?>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" placeholder="Enter email" name="email" <?php echo isset($email) && $email != '' ? 'value="' . $email . '"' : ''; ?>>
									<?php echo $emailErr != '' ? '<span class="text-danger">' . $emailErr . '</span>' : ''; ?>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" placeholder="Enter phone number" name="phone" <?php echo isset($phone) && $phone != '' ? 'value="' . $phone . '"' : ''; ?>>
									<?php echo $phoneErr != '' ? '<span class="text-danger">' . $phoneErr . '</span>' : ''; ?>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="form-group">
									<label>Address Line 1</label>
									<input type="text" class="form-control" placeholder="Enter address" name="address" <?php echo isset($address) && $address != '' ? 'value="' . $address . '"' : ''; ?>>
									<?php echo $addressErr != '' ? '<span class="text-danger">' . $addressErr . '</span>' : ''; ?>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="form-group">
									<label>Address Line 2</label>
									<input type="text" class="form-control" placeholder="Enter address" name="address2" <?php echo isset($address2) && $address2 != '' ? 'value="' . $address2 . '"' : ''; ?>>
									<?php echo $addressErr != '' ? '<span class="text-danger">' . $addressErr . '</span>' : ''; ?>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" placeholder="Enter city" name="city" <?php echo isset($city) && $city != '' ? 'value="' . $city . '"' : ''; ?>>
									<?php echo $cityErr != '' ? '<span class="text-danger">' . $cityErr . '</span>' : ''; ?>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Pincode</label>
									<input type="text" class="form-control" placeholder="Enter pincode" name="pincode" <?php echo isset($pincode) && $pincode != '' ? 'value="' . $pincode . '"' : ''; ?>>
									<?php echo $pincodeErr != '' ? '<span class="text-danger">' . $pincodeErr . '</span>' : ''; ?>
								</div>
							</div>
						</div>

						<div class="row justify-content-center my-2">
							<div class="col-md-8">
								<button type="submit" name="subForm" class="btn btn-outline-primary btn-sm">Update</button>
							</div>
						</div>
					</form>
				</div>

				<?php if ($_SESSION['category'] == '2') { ?>
					<div class="col">
						<h6 class="text-center">
							History
						</h6>

						<ul class="list-group">
							<?php
							foreach ($userAppointmentHistory as $history) { ?>
								<li class="list-group-item"><?php echo $history->firstName . " " . $history->lastname . "-" . $history->appointmentDate . "(" . $slots[$history->slot] . ")" . getBadge($history->status); ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php
include_once('./adders/footer.php');
?>