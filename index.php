<?php
include_once("./controller/check_session.php");

if ($_SESSION['logged_in'] != 1)
    header("Location: login.php");
else header("Location: dashboard.php");
