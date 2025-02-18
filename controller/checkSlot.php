<?php
ob_start();
session_start();

include_once "../config/database.php";
include_once "./functions.php";

$date = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['date'])));
$slot = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['slot'])));
$id = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['id'])));

if ($date != '' && $slot != '' && $id != '') {
    $requestUpdateId = json_decode(select_query($con, "count(*) as appointmentCount", "appointment_master", "doctorId=" . $id . " AND appointmentDate='" . $date . "' AND slot=" . $slot, "", "", ""));

    $result = [];
    array_push($result, $requestUpdateId[0]);
}

echo json_encode($result[0]);
