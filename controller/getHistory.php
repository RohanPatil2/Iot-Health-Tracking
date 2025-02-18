<?php

include_once "../config/database.php";
include_once "./functions.php";

$id = mysqli_real_escape_string($con, htmlspecialchars(trim($_GET['id'])));

if ($id != '') {
    $history = json_decode(select_query($con, "u.firstName, u.lastname, COUNT(firstName) AS appointmentCount", "appointment_master a JOIN user_master u ON a.uid=u.id", "doctorId=" . $id, "", "", ""));

    $listString = "";
    foreach ($history as $h) {
        $listString .= '<li class="list-group-item">' . $h->firstName . " " . $h->lastname . " (" . $h->appointmentCount . ")" . '</li>';
    }

    echo $listString;
} else echo "";
