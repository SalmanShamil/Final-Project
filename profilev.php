<?php

include_once "includs/header.php";

if (empty($_SESSION['utype']) || $_SESSION['utype'] == 'user'){
    header('Location: logout.php');
}
?>

  <main class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <div class="shape shape-style-1 shape-primary alpha-4">
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
    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?=(empty($fet['logo'])) ? 'assets/30-home_default.jpg' : 'assets/signup_images/'.$fet['logo']; ?>" class="rounded-circle" style="max-width: 180px; height: 180px;">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="edit_profilev.php?edi=<?=$fet['id'];?>" class="btn btn-sm btn-info mr-4">Edit Profile</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">

                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="<?=($fet['type'] == 'sublevel')?'vreq.php':'vreqt.php';?>" class="btn btn-sm btn-default">Verify Request</a>
                  <?php if (isset($fet['type']) && $fet['type'] == 'sublevel'){?>
                        <a href="verification_v.php" class="btn btn-sm btn-default">My Verification</a>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>
                  <?=(!empty($fet['name'])) ? $fet['name'] : 'Not Added';?>
              </h3>
            </div>


                    <?php

                        if ($fet['type'] == 'sublevel'){

                        $vsql = "SELECT * FROM verification_v WHERE user_id = '".$fet['id']."' ORDER BY id DESC";
                        $vres = mysqli_query($db, $vsql);

                        if (mysqli_num_rows($vres) > 0){?>
                            <div class="mt-5 py-1 border-top">
                                <div class="row justify-content-left">
                                    <div class="col-lg-12 text-justify">
                            <div class="col-md-12">
                                <h3>Verifications</h3>
                            </div>
                            <div class="row" style="padding-left: 15px; padding-right: 15px;">
                            <?php

                            while ($vfet = mysqli_fetch_array($vres)){
                    ?>
                            <div class="col-md-3 col-sm-6 text-center" style="padding: 5px; border: 1px solid #e3e3e3;">
                                <?php if ($vfet['doc_status'] == 0){?>
                                    <i class="fa fa-warning" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>
                                <?php }elseif ($vfet['doc_status'] == 1){?>
                                    <i class="fa fa-recycle" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>
                                <?php }elseif ($vfet['doc_status'] == 2){?>
                                    <i class="fa fa-check-square-o" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>
                                <?php }?>
                                <br>
                                <label><?=$vfet['req_doc_info'];?></label><br>
                                <?php
                                    $docimgs = explode(', ', $vfet['req_doc']);
                                    foreach ($docimgs as $immg){
                                        echo "<a href='assets/verification_doc/".$immg."' download><img src='assets/verification_doc/".$immg."' class='rounded-circle' style='width:35px; height:35px; margin-right: 5px;'></a>";
                                    }
                                ?>
                                <br>
                                <label style="margin-top: 10px;">Verified By: <a href="#"><strong><?=verifier_name_get($db, $vfet['com_id']);?><br>(Top Level Verifier)</strong></a></label>
                            </div>

                    <?php }?>
                            </div>
                </div>
              </div>
            </div>
                            <?php }else{?>
                            <div class="mt-5 py-1 border-top">
                                <div class="row justify-content-left">
                                    <div class="col-lg-12 text-justify">
                                    <div class="col-md-12">
                                        <h3>No Document Added For Verification Yet</h3>
                                        <a class="btn btn-sm btn-primary" href="add_verification_verif.php">Add Now &nbsp;<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                        <?php }}?>


              <div class="mt-3 py-5 border-top">
              <div class="row justify-content-left">
                <div class="col-lg-12 text-justify">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Verifier Email</th>
                                <td><?=$fet['email'];?></td>
                            </tr>
                            <tr>
                                <th>Verifier Phone</th>
                                <td><?=$fet['phone'];?></td>
                            </tr>
                            <tr>
                                <th>Verifier Started</th>
                                <td><?=date('d-M-Y', strtotime($fet['started']));?></td>
                            </tr>
                            <tr>
                                <th>Verifier Main Task</th>
                                <td><?=$fet['main_task'];?></td>
                            </tr>
                            <tr>
                                <th>Verifier Address</th>
                                <td><?=$fet['address'];?></td>
                            </tr>
                            <tr>
                                <th>Verifier Type</th>
                                <td><label class="badge badge-primary"><?=($fet['type'] == 'sublevel')?'Sub Level Verifier':'Top Level Verifier';?></label></td>
                            </tr>
                            <tr>
                                <th>Signup From</th>
                                <td><?=date('d-M-Y', strtotime($fet['signup_date']));?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php
include_once "includs/footer.php";
?>