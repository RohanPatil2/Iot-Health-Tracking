<?php
header('Access-Control-Allow-Origin: *');
define('SITE_ROOT', realpath(dirname(__FILE__)));
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');

$pageList = ['Profile', 'Dashboard', 'Chat with Doctor', 'History', 'Appointments', 'Help', 'Support', 'Feedback'];
$prepend = in_array($page, $pageList) ? '' : '.';

include_once $prepend . "./controller/check_session.php";
include_once $prepend . "./config/database.php";
include_once $prepend . "./controller/functions.php";

if (isset($_SESSION['logged_in']))
    $user = json_decode(select_query($con, "*", "user_master", "id=" . $_SESSION['uid'], "", "", ""));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords($page); ?> | Health Tracking</title>

    <link type="text/css" rel="stylesheet" href="<?php echo $prepend; ?>./assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $prepend; ?>./assets/css/sweetalert2.min.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?php echo $prepend; ?>./assets/css/style.css">

    <script src="<?php echo $prepend; ?>./assets/js/font-awesome.js" crossorigin="anonymous"></script>
    <script src="<?php echo $prepend; ?>./assets/js/jquery.js"></script>
    <script src="<?php echo $prepend; ?>./assets/js/sweetalert2.min.js"></script>

    <!-- Select2 CDN -->
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <?php if ($page == 'dashboard') { ?>
        <!-- Datatable CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <?php } else if ($page == 'Chat with Doctor') { ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $prepend; ?>./assets/css/chat.css">
    <?php } ?>
</head>

<body id="body-pd">
    <header class="header mb-5" id="header">
        <div class="header_toggle"> <i class='fas fa-bars' id="header-toggle"></i> </div>

        <?php if (isset($_SESSION['logged_in'])) { ?>
            <div class="border-right ml-auto mr-2">
                <h6 class="mr-2"><?php echo ucwords($user[0]->firstName . " " . $user[0]->lastname); ?></h6>
            </div>
            <div class="dropdown">
                <a class="nav-link nav-user text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="rounded-circle bg-dark p-3"><?php echo ucwords($user[0]->firstName[0] . " " . $user[0]->lastname[0]); ?></span>
                </a>
                <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                    <li class="border-bottom"><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo $prepend; ?>./logout.php">Logout</a></li>
                </ul>
            </div>
        <?php } else { ?>
            <a href="login.php" class="nav-link">Login</a>
        <?php } ?>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav_logo">
                    <i class="fas fa-heartbeat nav_logo-icon"></i>
                    <span class="nav_logo-name">Health Tracking</span>
                </a>

                <div class="nav_list">
                    <a href="dashboard.php" class="nav_link <?php echo $page == 'Dashboard' ? 'active' : ''; ?>">
                        <i class="fas fa-th"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="appointments.php" class="nav_link <?php echo $page == 'Appointments' ? 'active' : ''; ?>">
                        <i class="fas fa-hospital-user"></i>
                        <span class="nav_name">Appointments</span>
                    </a>
                    <?php if ($_SESSION['category'] == '2') { ?>
                        <a href="history.php" class="nav_link <?php echo $page == 'History' ? 'active' : ''; ?>">
                            <i class="fas fa-history"></i>
                            <span class="nav_name">Test History</span>
                        </a>
                    <?php } ?>
                    <a href="help.php" class="nav_link <?php echo $page == 'Help' ? 'active' : ''; ?>">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav_name">Help</span>
                    </a>
                    <a href="support.php" class="nav_link <?php echo $page == 'Support' ? 'active' : ''; ?>">
                        <i class="fas fa-info-circle"></i>
                        <span class="nav_name">Support</span>
                    </a>

                    <?php if ($_SESSION['category'] == '2') { ?>
                        <a href="feedback.php" class="nav_link <?php echo $page == 'Feedback' ? 'active' : ''; ?>">
                            <i class="fas fa-comment-medical"></i>
                            <span class="nav_name">Feedback</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset($_SESSION['uid'])) { ?>
                <a href="logout.php" class="nav_link"> <i class="fas fa-sign-out-alt"></i> <span class="nav_name">SignOut</span> </a>
            <?php } ?>
        </nav>
    </div>