<?php
include_once "includs/header.php";


if (isset($_POST['service_payment_submit'])){
    $cr_name = mysqli_real_escape_string($db, $_POST['crdname']);
    $cr_number = mysqli_real_escape_string($db, $_POST['crdnumber']);
    $cr_expiry = mysqli_real_escape_string($db, $_POST['crdexpiry']);
    $cr_cvv = mysqli_real_escape_string($db, $_POST['crdcvv']);
    $totalamn = mysqli_real_escape_string($db, $_POST['totalamount']);
    $user = mysqli_real_escape_string($db, $_POST['userid']);
    $mem = mysqli_real_escape_string($db, $_POST['pkid']);
    $point = mysqli_real_escape_string($db, $_POST['pkpoint']);

    if (empty($cr_name) || empty($cr_number) || empty($cr_expiry) || empty($cr_cvv) || empty($totalamn)){
        $_SESSION['msg'] = "All the payment fields are required";
    }else{
        if (strlen($cr_name) > 50){
            $_SESSION['msg'] = "Card Holder Name must be in 50 Character";
        }elseif (strlen($cr_number) != 16){
            $_SESSION['msg'] = "Card Number Must Be 16 Digit";
        }elseif (strtotime($cr_expiry) < strtotime(date("Y-m-d"))){
            $_SESSION['msg'] = "Card is Expired";
        }elseif (strlen($cr_cvv) != 3){
            $_SESSION['msg'] = "CVV/CVC Number must be 3 Digit";
        }else{

            $inSql = mysqli_query($db, "INSERT INTO `user_got_points`(user_id, point_pkg_id, point, c_name, c_number, c_expiry, c_cvv, pkg_active)
                                              VALUES('$user', '$mem', '$point', '$cr_name', '$cr_number', '$cr_expiry', '$cr_cvv', 1)");
            if ($inSql){
                $getCurrentPoint = mysqli_fetch_assoc(mysqli_query($db, "SELECT `mypoints` FROM `users` WHERE `id` = '".$user."'"))['mypoints'];
                $newpoint = $getCurrentPoint + $point;
                $upUser = mysqli_query($db, "UPDATE `users` SET mypoints = '$newpoint' WHERE `id` = '$user'");

                $_SESSION['msg'] = "Point Package Purchased Successfully";
                header("Location: all_point_packages.php");
            }else{
                $_SESSION['msg'] = "Error to purchase Point Package";
            }

        }
    }
}

if (!isset($_GET['get_mem']) && empty($_GET['get_mem'])){
    header('Location: login.php');
}else{
    if (!isset($_SESSION['uid'])){
        header('Location: login.php');
    }else{
        $userid = mysqli_real_escape_string($db, $_SESSION['uid']);
        $memid = mysqli_real_escape_string($db, $_GET['get_mem']);

        if (isset($_SESSION['utype']) && $_SESSION['utype'] = 'user'){
            $memfet = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM point_package WHERE pk_id = '$memid'"));
        }else{
            $memfet = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM point_package WHERE pk_id = '$memid'"));
        }
    }
}
?>


  <main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
    </div>




    <section class="section section-lg">

        <div class="container">
            <?php if (isset($_SESSION['msg'])){?>
            <div class="alert alert-info alert-dismissible fade show mi_alert_2" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong class="mi_alert_text_2"><?=$_SESSION['msg'];?></strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php unset($_SESSION['msg']);}?>
            <h3 class="text-center">Complete Purchase For Memebership</h3>
            <div class="row justify-content-center">
                <form style="width: 100%;" action="get_membership.php?get_mem=<?=$memid;?>" method="post" class="mb-5">
                    <input type="hidden" name="userid" value="<?=$userid;?>">
                    <input type="hidden" name="pkid" value="<?=$memid;?>">
                    <input type="hidden" name="pkpoint" value="<?=$memfet['pk_point'];?>">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered mt-5 mb-5">
                                <thead>
                                    <tr>
                                        <th>Pakcage Name</th>
                                        <th>Pakcage Price</th>
                                        <th>Pakcage Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?=$memfet['pk_title'];?></td>
                                        <td>BDT<?=$memfet['pk_price'];?></td>
                                        <td><span class="badge badge-primary" style="font-size: 20px;"><?=$memfet['pk_point'];?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Card Holder Name</label>
                                <input type="text" class="form-control" placeholder="Enter Card Holder Name" name="crdname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="number" class="form-control" placeholder="Enter Card Number" name="crdnumber">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Card Expiry Date</label>
                                <input type="date" class="form-control" placeholder="Enter Expiry" name="crdexpiry">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Card CVV/CVC</label>
                                <input type="number" class="form-control" placeholder="Enter Card CVV/CVC" name="crdcvv">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Amount to Pay</label>
                                <input type="number" class="form-control" placeholder="Amount to pay" value="<?=$memfet['pk_price'];?>" name="totalamount" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12 text-right">
                        <button class="btn btn-primary pull-right" type="submit" name="service_payment_submit">Complete Package Payment&nbsp;<i class="fa fa-credit-card"></i></button>
                    </div>

                </form>
            </div>
        </div>

    </section>

  </main>


<?php
include_once "includs/footer.php";
?>