<?php
    include_once "includs/header.php";
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
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white">A professional verifying
                  <span>system in Bangladesh</span>
                </h1>
                <p class="lead  text-white">The design system comes with four pre-built pages to help you get started faster. You can change the text and images and you're good to go.</p>
                <div class="btn-wrapper">
                  <a href="companies.php" class="btn btn-info btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fa fa-industry"></i></span>
                    <span class="btn-inner--text">Verifiers</span>
                  </a>
                  <a href="users.php" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                    <span class="btn-inner--text">All Users</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
            <?php
            $vsql = "SELECT * FROM company WHERE `type` = 'sublevel' AND status = 1 ORDER BY id DESC LIMIT 3";
            $vres = mysqli_query($db, $vsql);

            if (mysqli_num_rows($vres)>0){
                while ($vfet = mysqli_fetch_array($vres)){
                    ?>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4" style="padding:5px;width: 10rem;height: 10rem;margin-left: 20%;margin-right: auto;">
                      <img src="<?=(!empty($vfet['logo']))?'assets/signup_images/'.$vfet['logo']:'assets/30-home_default.jpg';?>" style="width: 100%;-webkit-border-radius: ;-moz-border-radius: ;border-radius: 100%;">
                    </div>
                      <h6 class="text-primary text-uppercase"><a href="view_verifier.php?vi=<?=$vfet['id'];?>"><?=$vfet['name'];?></a></h6>
                      <p><?=$vfet['email'];?>  |  <?=$vfet['phone'];?>  |  <?=$vfet['address'];?></p>
                    <ul class="nav nav-link">
                        <li><strong>Task:</strong> <?=$vfet['main_task'];?></li>
                    </ul>
                    <a href="view_verifier.php?vi=<?=$vfet['id'];?>" class="btn btn-primary mt-4">Know more</a>
                  </div>
                </div>
              </div>
            <?php }}?>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="section section-lg">
      <div class="container">
        <div class="row justify-content-center text-center mb-lg">
          <div class="col-lg-8">
            <h2 class="display-3">Lastest Signups</h2>
          </div>
        </div>
        <div class="row">

            <?php
                $usql = "SELECT * FROM users WHERE status = 1 ORDER BY id DESC LIMIT 4";
                $ures = mysqli_query($db, $usql);

                if (mysqli_num_rows($ures)>0){
                    while ($ufet = mysqli_fetch_array($ures)){
            ?>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="px-4">
              <a href="view_user.php?u=<?=$ufet['id'];?>"><img src="<?=(empty($ufet['picture'])) ? 'assets/30-home_default.jpg' : 'assets/signup_images/'.$ufet['picture']; ?>" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 180px; height: 180px;"></a>
              <div class="pt-4 text-center">
                <h5 class="title">
                    <a href="view_user.php?u=<?=$ufet['id'];?>"><span class="d-block mb-1"><?=$ufet['name'];?></span></a>
                  <small class="h6 text-muted"><?=(!empty($ufet['designation']))?$ufet['designation']:'Not Added Yet';?></small>
                </h5>
              </div>
            </div>
          </div>
          <?php }}?>

        </div>

        <div class="row text-center p-5">
            <a href="users.php" class="btn btn-primary mt-4 m-auto">View All Users</a>
        </div>
      </div>
    </section>

  </main>


<?php
    include_once "includs/footer.php";
?>