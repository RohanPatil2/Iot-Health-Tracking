<?php
$page = "Appointments";
include_once("./adders/header.php");

if ($_SESSION['category'] == '2')
    $appointments = json_decode(select_query($con, "a.*, u.firstName, u.lastName", "appointment_master a JOIN user_master as u ON a.doctorId=u.id", "a.enabled='1' AND a.uid=" . $_SESSION['uid'], "slot, status DESC", "", ""));
else
    $appointments = json_decode(select_query($con, "a.*, u.firstName, u.lastName", "appointment_master a JOIN user_master as u ON a.uid=u.id", "a.enabled='1' AND a.doctorId=" . $_SESSION['uid'], "appointmentDate, slot, status DESC", "", ""));

$doctors = json_decode(select_query($con, "*", "user_master", "enabled='1' AND category='1'", "", "", ""));

$slots = timeSlots;
$appointmentStages = appointmentStages;

$selectedDoctor = $selectedDoctorErr = $timeSlot = $timeSlotErr = $appointmentDate = $appointmentDateErr = "";

if (isset($_POST['subRequest'])) {
    $selectedDoctor = isset($_POST['selectedDoctor']) && trim($_POST['selectedDoctor'] != '') ? mysqli_real_escape_string($con, trim($_POST['selectedDoctor'])) : '';
    $appointmentDate = isset($_POST['appointmentDate']) && trim($_POST['appointmentDate'] != '') ? mysqli_real_escape_string($con, trim($_POST['appointmentDate'])) : '';
    $timeSlot = isset($_POST['timeSlot']) && trim($_POST['timeSlot'] != '') ? mysqli_real_escape_string($con, trim($_POST['timeSlot'])) : '';

    if ($selectedDoctor == '')
        $selectedDoctorErr = "Doctor name is required";

    if ($appointmentDate == '')
        $appointmentDateErr = "Appointment date is required";

    if ($timeSlot == '')
        $timeSlotErr = "Time slot is required";

    if ($selectedDoctorErr == '' && $appointmentDateErr == '' && $timeSlotErr == '') {

        if (isset($_GET['pref']) && !isset($_GET['act'])) {
            $requestUpdateId = update_query($con, "appointment_master", "appointmentDate='" . $appointmentDate . "', slot=" . $timeSlot . ", updatedBy=" . $_SESSION['uid'], "id=" . decryption($_GET['pref']));

            if ($requestUpdateId != '') {
                echo '<script>swal({title: "Appointment has been updated successfully",type: "success",button: "Ok"}).then(function() {window.location.href = "appointments.php";});</script>';
            } else {
                echo '<script>swal({title: "Something went wrong",type: "error",button: "Ok"});</script>';
            }
        } else {
            $insertedAppointment = json_decode(insert_query($con, array('uid', 'doctorId', 'appointmentDate', 'slot', 'status', 'createdBy', 'updatedBy'), array($_SESSION['uid'], $selectedDoctor, $appointmentDate, $timeSlot, '1', $_SESSION['uid'], $_SESSION['uid']), "appointment_master"));

            if ($insertedAppointment) {
                echo '<script>swal({title: "Appointment request sent successfully",type: "success",button: "Ok"}).then(function() {window.location.href = "appointments.php";});</script>';
            } else {
                echo '<script>swal({title: "Something went wrong",type: "error",button: "Ok"});</script>';
            }
        }
    }
}

if (isset($_GET['pref']) && !isset($_GET['act'])) {
    $appointmentToEdit = json_decode(select_query($con, "a.*, u.firstName, u.lastName", "appointment_master a JOIN user_master as u", "a.id=" . decryption($_GET['pref']), "", "", ""));

    if (count($appointmentToEdit) > 0) {
        $selectedDoctor = $appointmentToEdit[0]->doctorId;
        $timeSlot = $appointmentToEdit[0]->slot;
        $appointmentDate = $appointmentToEdit[0]->appointmentDate;
    }
}

if (isset($_GET['pref']) && isset($_GET['act']) && $_GET['act'] === "at") {
    $isDeleted = json_decode(update_query($con, "appointment_master", "enabled='0', updatedBy=" . $_SESSION['uid'], "id=" . decryption($_GET['pref'])));

    if ($isDeleted)
        echo '<script>swal({title: "Appointment deleted successfully",type: "success",button: "Ok"}).then(function() {window.location.href = "appointments.php";});</script>';
    else
        echo '<script>swal({title: "Something went wrong",type: "error",button: "Ok"});</script>';
}
?>
<!--Container Main start-->
<div class="m-3">
    <div class="row">
        <h4 class="text-uppercase"><?php echo $page; ?></h4>
    </div>

    <?php
    if ($_SESSION['category'] == '2') { ?>
        <div class="row">
            <form class="w-100" action="" method="POST" class="validate-form">
                <label class="my-3 locality-label"><b>Appointment Details</b></label>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Select Doctor</label>
                            <select class="custom-select custom-select-sm" name="selectedDoctor" onchange="getHistory(event)">
                                <option selected disabled>Select Doctor</option>
                                <?php
                                foreach ($doctors as $doctor) { ?>
                                    <option value="<?php echo $doctor->id; ?>" <?php echo $selectedDoctor != "" && $selectedDoctor == $doctor->id  ? 'selected' : ""; ?>><?php echo $doctor->firstName . " " . $doctor->lastname; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo isset($selectedDoctorErr) && $selectedDoctorErr != '' ? '<small class="text-danger">' . $selectedDoctorErr . '</small>' : ''; ?>
                        </div>
                        <a class="btn btn-primary d-none" href="" id="viewHistoryBtn" data-toggle="modal" data-target=".bd-example-modal-lg">View History</a>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Select Date</label>
                            <input type="date" class="form-control form-control-sm" name="appointmentDate" <?php echo isset($appointmentDate) && $appointmentDate != '' ? 'value="' . date('Y-m-d', strtotime(date($appointmentDate))) . '"' : 'value="' . date('Y-m-d') . '"'; ?>>
                            <?php echo $appointmentDateErr != '' ? '<span class="text-danger">' . $appointmentDateErr . '</span>' : ''; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Select TimeSlot</label>
                            <select class="custom-select custom-select-sm" name="timeSlot" onchange="getSlot(event);">
                                <option selected disabled>Select Slot</option>
                                <?php
                                foreach ($slots as $slot) { ?>
                                    <option value="<?php echo (array_search($slot, $slots) + 1); ?>" <?php echo $timeSlot != "" && $slots[$timeSlot - 1] == $slot  ? 'selected' : ""; ?>><?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo isset($timeSlotErr) && $timeSlotErr != '' ? '<small class="text-danger">' . $timeSlotErr . '</small>' : ''; ?>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-center">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="Book Appointment" name="subRequest">
                    </div>
            </form>
        </div>
    <?php } ?>

    <div class="row w-100 my-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php if ($_SESSION['category'] == '2') { ?>
                            <th scope="col">Doctor Name</th>
                        <?php } else { ?>
                            <th scope="col">Patient Name</th>
                        <?php } ?>
                        <th scope="col">Date</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Status</th>
                        <?php if ($_SESSION['category'] == '2') { ?>
                            <th scope="col">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($appointments as $appointment) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $appointment->firstName . " " . $appointment->lastName; ?></td>
                            <td><?php echo date('d M Y', strtotime(date($appointment->appointmentDate))); ?></td>
                            <td><?php echo $slots[$appointment->slot]; ?></td>
                            <td>
                                <?php {
                                    if ($appointment->status != '2' && $appointment->status != '4') { ?>
                                        <select class="custom-select custom-select-sm a<?php echo $appointment->id; ?>" id="<?php echo $appointment->id; ?>" onchange="statusChange(event);">
                                            <option selected disabled>Select Status</option>
                                            <?php
                                            foreach ($appointmentStages as $stage) { ?>
                                                <option value="<?php echo (array_search($stage, $appointmentStages) + 1); ?>" <?php echo $appointment->status != "" && $appointmentStages[$appointment->status - 1] == $stage  ? 'selected disabled' : ""; ?>><?php echo $stage; ?></option>
                                            <?php } ?>
                                        </select>
                                <?php  } else echo $appointmentStages[$appointment->status - 1];
                                } ?>
                            </td>
                            <?php if ($_SESSION['category'] == '2') { ?>
                                <td>
                                    <?php if ($appointment->status != '2' && $appointment->status != '4') { ?>
                                        <a href="appointments.php?pref=<?php echo encryption($appointment->id); ?>"><i class="fas fa-pen"></i></a>
                                        <a href="appointments.php?act=at&pref=<?php echo encryption($appointment->id); ?>"><i class="fas fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="statusModal<?php echo $appointment->id; ?>" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h6>Are you sure want to change status of your appointment?</h6>
                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">No</button>
                                        <button type="button" id="<?php echo $appointment->id; ?>" onclick="changeStatus(event)" class="btn btn-danger btn-sm">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Patients treated and their count
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "./adders/footer.php";
?>

<script>
    function statusChange(event) {
        var id = event.target.id;
        var status = $(".a" + id).val();

        if (status != null && status != undefined) {
            $('#statusModal' + id).modal('toggle')
        }
    }

    function changeStatus(event) {
        debugger
        var id = event.target.id;
        var status = $(".a" + id).val();

        $.ajax({
            type: "GET",
            url: "./controller/requestHandler.php?id=" + id + "&status=" + status,
            success: function(data) {
                d = JSON.parse(data);
                if (d[0]) {
                    swal({
                        title: "Status has been updated successfully",
                        type: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location.href = "appointments.php";
                    });
                } else {
                    swal({
                        title: "Something went wrong",
                        type: "error",
                        button: "Ok"
                    });
                }
            }
        })
    }

    function getSlot(event) {
        var slot = event.target.value;
        var selectedDoctor = $("select[name=selectedDoctor").val();
        var appointmentDate = $("input[name=appointmentDate").val();

        if (slot != null && slot != undefined && appointmentDate != null && appointmentDate != undefined && selectedDoctor != null && selectedDoctor != undefined) {
            $.ajax({
                type: "GET",
                url: "./controller/checkSlot.php?id=" + selectedDoctor + "&slot=" + slot + "&date=" + appointmentDate,
                success: function(data) {
                    d = JSON.parse(data);
                    if (d.appointmentCount > 0) {
                        swal({
                            title: "This slot is booked, please book another slot",
                            type: "error",
                            button: "Ok"
                        });
                    }
                }
            })
        } else {
            swal({
                title: "Please select appointment date to verify slot",
                type: "error",
                button: "Ok"
            });
        }
    }

    function getHistory(event) {
        var selectedDoctor = event.target.value;

        if (selectedDoctor != null && selectedDoctor != undefined) {
            $("#viewHistoryBtn").removeClass("d-none");
            $.ajax({
                type: "GET",
                url: "./controller/getHistory.php?id=" + selectedDoctor,
                success: function(data) {
                    $("ul").append(data);
                }
            })
        } else {
            $("#viewHistoryBtn").addClass("d-none");
        }
    }
</script>