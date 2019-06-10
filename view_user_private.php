<?php

include_once "includs/header.php";

if (!isset($_GET['sid']) || empty($_GET['sid']) && !isset($_GET['uid']) || empty($_GET['uid'])){
    header('Location: login.php');
}else{
    $brSql = "SELECT * FROM board WHERE sid = '".$_GET['sid']."' AND `type` = 2";
    $brRes = mysqli_query($db, $brSql);

    if (mysqli_num_rows($brRes)>0){
        $desFet = mysqli_fetch_assoc($brRes);
        $ufet = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE `id` = '".$_GET['uid']."'"));
    }else{
        header("Location: login.php");
    }
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
            <div class="row justify-content-center pb-5">
              <div class="col-lg-3 order-lg-2 mb-5">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?=(empty($ufet['picture'])) ? 'assets/30-home_default.jpg' : 'assets/signup_images/'.$ufet['picture']; ?>" class="rounded-circle" style="max-width: 180px; height: 180px;">
                  </a>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>
                  <?=(!empty($ufet['name'])) ? $ufet['name'] : 'Not Added';?>
              </h3>
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i><?=(!empty($ufet['designation'])) ? $ufet['designation'] : 'Not Added';?></div>
                <p style="font-size: 12px; font-weight: bold;">
                    <?=(!empty($ufet['dob'])) ? date('d-M-Y', strtotime($ufet['dob'])) : '';?> |
                    <?=(!empty($ufet['phone'])) ? $ufet['phone'] : '';?> |
                    <?=(!empty($ufet['address'])) ? $ufet['address'] : '';?>
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



            <div class="mt-5 py-5 border-top">
              <div class="row justify-content-left">
                <div class="col-lg-12 text-justify">
                  <p><?=(!empty($ufet['bio'])) ? $ufet['bio'] : 'Not Added';?></p>
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