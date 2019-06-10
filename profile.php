<?php

include_once "includs/header.php";

if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
    header('Location: logout.php');
}else{
    if (!empty($_SESSION['utype']) && $_SESSION['utype'] == 'verifier'){
        header('Location: profilev.php');
    }
}

$brSql = "SELECT * FROM board WHERE user_id = '".$fet['id']."' AND `type` = 1 AND `default` = 1";
$brRes = mysqli_query($db, $brSql);
$desFet = mysqli_fetch_assoc($brRes);
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
                    <img src="<?=(empty($fet['picture'])) ? 'assets/30-home_default.jpg' : 'assets/signup_images/'.$fet['picture']; ?>" class="rounded-circle" style="max-width: 180px; height: 180px;">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="edit_profile.php?edi=<?=$fet['id'];?>" class="btn btn-sm btn-info mr-4">Edit Profile</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">

                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="boards.php" class="btn btn-sm btn-default">View Boards</a>
                  <a href="verification.php" class="btn btn-sm btn-default">Verification</a>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>
                  <?=(!empty($fet['name'])) ? $fet['name'] : 'Not Added';?>
              </h3>
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i><?=(!empty($fet['designation'])) ? $fet['designation'] : 'Not Added';?></div>
                <p style="font-size: 12px; font-weight: bold;">
                    <?=(!empty($fet['dob'])) ? date('d-M-Y', strtotime($fet['dob'])) : '';?> |
                    <?=(!empty($fet['phone'])) ? $fet['phone'] : '';?> |
                    <?=(!empty($fet['address'])) ? $fet['address'] : '';?>
                </p>
            </div>


              <?php
                if (!empty($desFet['verification_id'])){?>
              <div class="mt-5 py-1 border-top">
                  <div class="row justify-content-left">
                      <div class="col-lg-12 text-justify">
                          <div class="col-md-12">
                              <h3>Verifications</h3>
                          </div>
                          <div class="row" style="padding-left: 15px; padding-right: 15px;">
                <?php
                    $exid = explode(', ', $desFet['verification_id']);
                foreach ($exid as $didd){
                    echo verification_items($db, $didd, $fet['id']);
                }?>
                          </div>
                      </div>
                  </div>
              </div>
              <?php }?>


              <div class="mt-3 py-5 border-top">
              <div class="row justify-content-left">
                <div class="col-lg-12 text-justify">
                  <p><?=(!empty($fet['bio'])) ? $fet['bio'] : 'Not Added';?></p>
                </div>
              </div>
            </div>
              <div class="py-3 border-top">
                  <div class="row justify-content-left">
                      <div class="col-lg-12 text-justify">
                          <?php
                                echo $desFet['board_content'];
                          ?>
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