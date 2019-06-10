<?php
include_once "includs/header.php";


if (isset($_GET['search_submit'])){
    $snm = mysqli_real_escape_string($db, $_GET['search_name']);
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

        <div class="container-wrapper" style="position: absolute;top: 180px; width: 100%;">
            <div class="row">
                <div class="container">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <form action="companies.php" method="get">
                                <div class="input-group input-group-alternative mb-4">
                                    <input class="form-control" placeholder="Search verifiers by their name" name="search_name" type="text">
                                    <button class="input-group-prepend" type="submit" name="search_submit">
                                        <span class="input-group-text search-mi btn btn-natural">
                                            <i class="ni ni-zoom-split-in"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- 1st Hero Variation -->
    </div>




    <section class="section section-lg">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        <?php
                        $limit = 8;

                        if(isset($_GET["pg"])){
                            $pageno = $_GET["pg"];
                            $start = round(($pageno * $limit) - $limit);
                        }else{
                            $start = 0;
                        }

                        if (isset($snm)){
                            $usql = "SELECT * FROM company WHERE `type` = 'sublevel' AND status = 1 AND `name` LIKE '%$snm%' ORDER BY id DESC LIMIT $start,$limit";
                        }else{
                            $usql = "SELECT * FROM company WHERE `type` = 'sublevel' AND status = 1 ORDER BY id DESC LIMIT $start,$limit";
                        }
                        $ures = mysqli_query($db, $usql);

                        if (mysqli_num_rows($ures)>0){
                            while ($ufet = mysqli_fetch_array($ures)){
                                ?>
                            <div class="col-lg-4 mt-5">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4" style="padding:5px;width: 10rem;height: 10rem;margin-left: 20%;margin-right: auto;">
                                        <img src="<?=(!empty($ufet['logo']))?'assets/signup_images/'.$ufet['logo']:'assets/30-home_default.jpg';?>" style="width: 100%;-webkit-border-radius: ;-moz-border-radius: ;border-radius: 100%;">
                                    </div>
                                    <h6 class="text-primary text-uppercase"><a href="view_verifier.php?vi=<?=$ufet['id'];?>"><?=$ufet['name'];?></a></h6>
                                    <p><?=$ufet['email'];?>  |  <?=$ufet['phone'];?>  |  <?=$ufet['address'];?></p>
                                    <ul class="nav nav-link">
                                        <li><strong>Task:</strong> <?=$ufet['main_task'];?></li>
                                    </ul>
                                    <a href="view_verifier.php?vi=<?=$ufet['id'];?>" class="btn btn-primary mt-4">Know more</a>
                                </div>
                            </div>
                        </div>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>

      <div class="container">
        <div class="row text-center p-5">
          <nav aria-label="Page navigation example" class="mb-4" style="margin-top: 50px;">
            <ul class="pagination">
                <?php
                $count = mysqli_num_rows($ures);
                $pageno = ceil($count/7);
                for($i=1;$i<=$pageno;$i++){
                    ?>
                    <li class="page-item <?=($i == $_GET['pg'])?'active':'';?>">
                        <a class="page-link" href="companies.php?pg=<?=$i;?>"><?=$i;?></a>
                    </li>
                <?php }?>
            </ul>
          </nav>
        </div>
      </div>
    </section>

  </main>


<?php
include_once "includs/footer.php";
?>