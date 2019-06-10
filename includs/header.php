<?php
    require_once 'private/db.php';
    ob_start();

if (isset($_SESSION['uid']) || !empty($_SESSION['uid'])){

    $uid = $_SESSION['uid'];
    $notify = 'Please add those information to your profile<br>';
    $notifier = '';

    if ($_SESSION['utype'] == 'user'){
        $mysql = "SELECT * FROM `users` WHERE `id` = '$uid'";
        $res = mysqli_query($db, $mysql);
        $fet = mysqli_fetch_assoc($res);

        if (empty($fet['designation'])){
            $notify.= '- Designation<br>';
        }
        if (empty($fet['bio'])){
            $notify.= '- Bio<br>';
        }
        if (empty($fet['picture'])){
            $notify.= '- Picture<br>';
        }
        if (empty($fet['designation']) || empty($fet['bio']) || empty($fet['picture'])){
            $notifier = $notify;
        }
    }else{
        $mysql = "SELECT * FROM `company` WHERE `id` = '$uid'";
        $res = mysqli_query($db, $mysql);
        $fet = mysqli_fetch_assoc($res);

        if (empty($fet['logo'])){
            $notify.= '- Logo<br>';
        }
        if (empty($fet['main_task'])){
            $notify.= '- Main Task<br>';
        }
        if (empty($fet['logo']) || empty($fet['main_task'])){
            $notifier = $notify;
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Proverifier | Verify your document</title>
    <!-- Favicon -->
    <link href="assets/fav.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugin/editor/richtext.min.css">

    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css?v=1.0.1" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="assets/css/docs.min.css" rel="stylesheet">
    <link type="text/css" href="style.css" rel="stylesheet">


    <script src="assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>
<?php if (!empty($notifier)){?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: absolute;right: 15px;top:15px;z-index: 999999;">
        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
        <span class="alert-inner--text"><?=$notifier;?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php }?>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="index.php">
                <img src="assets/img_ivs.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="components.html">
                                <img src="assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="companies.php" role="button">
                            <span class="nav-link-inner--text">All Verifier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php" role="button">
                            <span class="nav-link-inner--text">All Users</span>
                        </a>
                    </li>
                    <?php if (!empty($_SESSION['uid'])){

                        if ($_SESSION['utype'] == 'verifier'){?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link">Elements <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="profilev.php" role="button">
                                            <span class="nav-link-inner--text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="<?=($fet['type'] == 'sublevel')?'vreq.php':'vreqt.php';?>" role="button">
                                            <span class="nav-link-inner--text">View Requests</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="verification_v.php" role="button">
                                            <span class="nav-link-inner--text">My Verifications</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php }else{?>
                            <li class="nav-item">
                                <a class="nav-link" href="all_point_packages.php" role="button">
                                    <span class="nav-link-inner--text">Point Packages</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link">Elements <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="profile.php" role="button">
                                            <span class="nav-link-inner--text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="boards.php" role="button">
                                            <span class="nav-link-inner--text">My Boards</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="verification.php" role="button">
                                            <span class="nav-link-inner--text">My Verifications</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="dropdown-item-text" href="my_point_purchases.php" role="button">
                                            <span class="nav-link-inner--text">My Point Purchase</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                    <?php }}?>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="<?=(isset($_SESSION['uid']) || !empty($_SESSION['uid'])) ? 'logout.php' : 'login.php'; ?>" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              <i class="fa <?=(isset($_SESSION['uid']) || !empty($_SESSION['uid'])) ? 'fa-sign-out' : 'fa-sign-in'; ?> mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text"><?=(isset($_SESSION['uid']) || !empty($_SESSION['uid'])) ? 'Logout' : 'Login / Signup'; ?></span>
                        </a>
                        <?php if (isset($_SESSION['uid'])){?>
                        <a class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              My Point:
                            </span>
                            <span class="nav-link-inner--text">
                                <?=$fet['mypoints'];?>
                            </span>
                        </a>
                        <?php

                            if ($_SESSION['utype'] == 'verifier'){
                            $unsSql = mysqli_fetch_assoc(mysqli_query($db, "SELECT `type` FROM `company` WHERE `id` = '".$_SESSION['uid']."'"));

                            if ($unsSql['type'] == 'sublevel'){
                        ?>
                        <div class="btn-group" id="mi_get_not">

                        </div>
                        <?php }}}?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php if (isset($unsSql['type']) && $unsSql['type'] == 'sublevel'){?>
<script>
    $(document).ready(function () {
        $('body').on('click', '.mi_notify_btn', function (e) {
            e.preventDefault();
            var uid = $(this).val();
            var type = $(this).attr('utype');

            $.ajax({
                type: 'post',
                url: 'actions.php',
                data: {not_user_id: uid, not_user_type: type},
                success: function (data) {
                    console.log(data);
                    setInterval(function () {
                        window.location.href = "<?=$_SERVER['REQUEST_URI'];?>";
                    }, 7000);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        get_notif(<?=$_SESSION['uid'];?>, '<?=$_SESSION['utype'];?>');
        function get_notif(id, type) {
            var uid = id;
            var utype = type;
            $.ajax({
                type: 'post',
                url: 'actions.php',
                data: {getnot_user_id: uid, getnot_user_type: utype},
                success: function (data) {
                    $('#mi_get_not').html(data);
                }
            });
        }
    });
</script>
<?php }?>
