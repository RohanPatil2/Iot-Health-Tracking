<?php
$page = "Dashboard";
include_once("./adders/header.php");

$slots = timeSlots;
$stage = appointmentStages;

function getBadge($s)
{
	$st = appointmentStages;

	if ($s == 1)
		return ' <span class="badge badge-primary">' . $st[($s - 1)] . '</span>';
	if ($s == 2)
		return ' <span class="badge badge-success">' . $st[($s - 1)] . '</span>';
	if ($s == 3)
		return ' <span class="badge badge-info">' . $st[($s - 1)] . '</span>';
	if ($s == 4)
		return ' <span class="badge badge-danger">' . $st[($s - 1)] . '</span>';
}
?>
<!--Container Main start-->
<div class="m-3">
	<div class="row">
		<h4 class="text-uppercase"><?php echo $page; ?></h4>
	</div>

	<?php if ($_SESSION['category'] == '2') { ?>
		<div class="row justify-content-center">
			<div class="col-sm-3">
				<a href="./add_request.php">
					<div class="card text-white bg-success">
						<div class="card-body text-center">
							<p class="card-text"><i class="fas fa-play"></i>&nbsp;Run Test</p>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="row justify-content-center mt-5">
			<div class="col">
				<div class="card bg-warning" data-toggle="modal" data-target="#tempratureModal">
					<div class="card-body text-center">
						<span class="display-card-icon">
							<i class="fas fa-thermometer"></i>
						</span>
						<h4 class="card-title font-weight-bold">60&#8451;</h4>
						<p class="card-text font-weight-bold">Body Temprature</p>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="tempratureModal" tabindex="-1" role="dialog" aria-labelledby="tempratureModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>

									<div class="row">
										<div class="col text-center">
											<h4 class="font-weight-bold">60&#8451;</h4>
											<div class="progress" style="height: 30px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">30-40</div>
												<div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">40-70</div>
												<div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">>70</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-center my-5">
										<div class="col-sm-3 d-flex justify-content-center">
											<img class="filter-warning" src="./assets/images/icon/human-body.svg" height="300" width="300">
										</div>
									</div>

									<div class="row justify-content-center">
										<p class="text-center">Your body temprature is higher than normal.<br>Consider taking rest</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card bg-danger text-white" data-toggle="modal" data-target="#heartbeatModal">
					<div class="card-body text-center">
						<span class="display-card-icon">
							<i class="fas fa-wave-square"></i>
						</span>
						<h4 class="card-title font-weight-bold">120</h4>
						<p class="card-text font-weight-bold">Heartbeat</p>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="heartbeatModal" tabindex="-1" role="dialog" aria-labelledby="heartbeatModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>

									<div class="row">
										<div class="col text-center">
											<h4 class="font-weight-bold">120</h4>
											<div class="progress" style="height: 30px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">&#60;60</div>
												<div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">60-100</div>
												<div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">>100</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-center my-5">
										<div class="col-sm-3 d-flex justify-content-center">
											<i class="fas fa-heartbeat text-danger" style="font-size: 140px;"></i>
										</div>
									</div>

									<div class="row justify-content-center">
										<p class="text-center">Your heartbeats are too high.<br>Consider consulting a doctor</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card bg-success text-white" data-toggle="modal" data-target="#spo2Modal">
					<div class="card-body text-center">
						<span class="display-card-icon">
							<i class="fas fa-lungs"></i>
						</span>
						<h4 class="card-title font-weight-bold">92</h4>
						<p class="card-text font-weight-bold">SPO2 Level</p>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="spo2Modal" tabindex="-1" role="dialog" aria-labelledby="spo2ModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>

									<div class="row">
										<div class="col text-center">
											<h4 class="font-weight-bold">92</h4>
											<div class="progress" style="height: 30px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">90-100</div>
												<div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">85-90</div>
												<div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">&#60;85</div>
											</div>
										</div>
									</div>

									<div class="row justify-content-center my-5">
										<div class="col-sm-3 d-flex justify-content-center">
											<i class="fas fa-lungs-virus text-success" style="font-size: 140px;"></i>
										</div>
									</div>

									<div class="row justify-content-center">
										<p class="text-center">Your SPO2 level is normal.<br>Keep it going!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<a class="btn btn-info my-3" href="">Generate report</a>
			<p class="w-100 text-center">Last tested on: 12-11-2023 06:37 PM</p>
		</div>

		<div class="row">
			<div class="card w-100">
				<div class="card-body">
					<h5 class="font-weight-bold text-center">Recent test results</h5>
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								<p class="mb-0">Tested On: 10-11-2023 03:23 PM</p>
							</div>

							<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<div class="row justify-content-center my-5">
										<div class="col">
											<div class="card bg-warning">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-thermometer"></i>
													</span>
													<h4 class="card-title font-weight-bold">60&#8451;</h4>
													<p class="card-text font-weight-bold">Body Temprature</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-danger text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-wave-square"></i>
													</span>
													<h4 class="card-title font-weight-bold">120</h4>
													<p class="card-text font-weight-bold">Heartbeat</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-success text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-lungs"></i>
													</span>
													<h4 class="card-title font-weight-bold">92</h4>
													<p class="card-text font-weight-bold">SPO2 Level</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<p class="mb-0">Tested On: 01-11-2023 03:23 PM</p>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<div class="row justify-content-center my-5">
										<div class="col">
											<div class="card bg-warning">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-thermometer"></i>
													</span>
													<h4 class="card-title font-weight-bold">60&#8451;</h4>
													<p class="card-text font-weight-bold">Body Temprature</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-danger text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-wave-square"></i>
													</span>
													<h4 class="card-title font-weight-bold">120</h4>
													<p class="card-text font-weight-bold">Heartbeat</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-success text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-lungs"></i>
													</span>
													<h4 class="card-title font-weight-bold">92</h4>
													<p class="card-text font-weight-bold">SPO2 Level</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<p class="mb-0">Tested On: 28-10-2023 03:23 PM</p>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<div class="row justify-content-center my-5">
										<div class="col">
											<div class="card bg-warning">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-thermometer"></i>
													</span>
													<h4 class="card-title font-weight-bold">60&#8451;</h4>
													<p class="card-text font-weight-bold">Body Temprature</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-danger text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-wave-square"></i>
													</span>
													<h4 class="card-title font-weight-bold">120</h4>
													<p class="card-text font-weight-bold">Heartbeat</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-success text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-lungs"></i>
													</span>
													<h4 class="card-title font-weight-bold">92</h4>
													<p class="card-text font-weight-bold">SPO2 Level</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<p class="mb-0">Tested On: 25-10-2023 03:23 PM</p>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<div class="row justify-content-center my-5">
										<div class="col">
											<div class="card bg-warning">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-thermometer"></i>
													</span>
													<h4 class="card-title font-weight-bold">60&#8451;</h4>
													<p class="card-text font-weight-bold">Body Temprature</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-danger text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-wave-square"></i>
													</span>
													<h4 class="card-title font-weight-bold">120</h4>
													<p class="card-text font-weight-bold">Heartbeat</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-success text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-lungs"></i>
													</span>
													<h4 class="card-title font-weight-bold">92</h4>
													<p class="card-text font-weight-bold">SPO2 Level</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								<p class="mb-0">Tested On: 20-10-2023 03:23 PM</p>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<div class="row justify-content-center my-5">
										<div class="col">
											<div class="card bg-warning">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-thermometer"></i>
													</span>
													<h4 class="card-title font-weight-bold">60&#8451;</h4>
													<p class="card-text font-weight-bold">Body Temprature</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-danger text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-wave-square"></i>
													</span>
													<h4 class="card-title font-weight-bold">120</h4>
													<p class="card-text font-weight-bold">Heartbeat</p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card bg-success text-white">
												<div class="card-body text-center">
													<span class="history-card-icon">
														<i class="fas fa-lungs"></i>
													</span>
													<h4 class="card-title font-weight-bold">92</h4>
													<p class="card-text font-weight-bold">SPO2 Level</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } else if ($_SESSION['category'] == '1') {
		$appointmentHistory = json_decode(select_query($con, "a.appointmentDate, a.slot, a.status, u.firstName, u.lastname", "appointment_master a JOIN user_master u ON a.uid=u.id", "appointmentDate < DATE_ADD(NOW(), INTERVAL -1 MONTH) AND a.doctorId=" . $_SESSION['uid'], "status ASC", "", ""));
	?>
		<div class="row justify-content-center">
			<div class="card">
				<div class="card-header text-center">
					Patients treated in last 30 days
				</div>
				<div class="card-body">
					<ul class="list-group">
						<?php
						foreach ($appointmentHistory as $h) {
							echo '<li class="list-group-item">' . $h->firstName . " " . $h->lastname . "-" . $h->appointmentDate . " (" . $slots[$h->slot] . ")  	" . getBadge($h->status) . '</li>';
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php
include_once "./adders/footer.php";
?>