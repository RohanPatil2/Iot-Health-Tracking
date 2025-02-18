<?php
ob_start();
session_start();

include_once "../config/database.php";
include_once "./functions.php";

$status = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['status'])));
$id = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['id'])));

if ($status != '') {
    $requestUpdateId = update_query($con, "appointment_master", "status='" . $status . "'", "id=" . $id);

    $result = [];
    if ($requestUpdateId != '')
        array_push($result, true);
}

echo json_encode($result);
