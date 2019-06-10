<?php
include_once "includs/header.php";

if ($_SESSION['utype'] != 'user'){
    header("Location: profilev.php");
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
        <?php if (isset($_SESSION['msg'])){?>
            <div class="alert alert-info alert-dismissible fade show mi_alert_2" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong class="mi_alert_text_2"><?=$_SESSION['msg'];?></strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php unset($_SESSION['msg']);}?>

        <div class="container">
            <h3 class="text-center">Our Point Packages</h3>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        <?php
                        $usql = "SELECT * FROM point_package WHERE `status` = 1 ORDER BY pk_id";
                        $ures = mysqli_query($db, $usql);

                        if (mysqli_num_rows($ures)>0){
                            while ($ufet = mysqli_fetch_array($ures)){
                                ?>
                            <div class="col-lg-4 mt-5">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5 text-center">
                                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4" style="width: 10rem;height: 10rem;">
                                        <h1><?=$ufet['pk_point'];?></h1>
                                    </div>
                                    <h5 class="text-center text-uppercase"><?=$ufet['pk_title'];?></h5>
                                    <ul class="nav nav-link text-center">
                                        <li><strong>Price:</strong> BDT<?=$ufet['pk_price'];?></li>
                                    </ul>
                                    <a href="get_membership.php?get_mem=<?=$ufet['pk_id'];?>" class="btn btn-primary mt-4 text-center">Get This Package</a>
                                </div>
                            </div>
                        </div>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>

    </section>

  </main>


<?php
include_once "includs/footer.php";
?>