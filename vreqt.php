<?php

include_once "includs/header.php";

if (empty($_SESSION['utype']) || $_SESSION['utype'] == 'user'){
    header('Location: logout.php');
}
if (isset($fet['type']) && $fet['type'] != 'toplevel'){
    header('Location: logout.php');
}

if (isset($_GET['ac'])){
    $acid = mysqli_real_escape_string($db, $_GET['ac']);
    $acsql = "UPDATE verification_v SET doc_status = 1 WHERE id = '$acid'";
    $acres = mysqli_query($db, $acsql);

    if ($acres){
        $msg = "Successfully Accepted the Request";
    }else{
        $msg = "Request Not Accepted";
    }
}
if (isset($_GET['vf'])){
    $vfid = mysqli_real_escape_string($db, $_GET['vf']);
    $vfsql = "UPDATE verification_v SET doc_status = 2 WHERE id = '$vfid'";
    $vfres = mysqli_query($db, $vfsql);

    if ($vfres){
        $msg = "Successfully Verified the Request";
    }else{
        $msg = "Request Not Verified";
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
            <div class="card-header">
                <?php if (isset($fet['type']) && $fet['type'] == 'sublevel'){?>
                    All of your verification requests from users
                <?php }else{?>
                    All of your verification requests from sub-verifiers
                <?php }?>
            </div>
            <div class="card-body">
                <?php if (isset($msg)){?>
                    <div class="alert alert-info alert-dismissible fade show mi_alert" role="alert">
                        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                        <span class="alert-inner--text"><strong><?=$msg;?></strong></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php }else{?>
                    <div class="alert alert-info alert-dismissible fade show mi_alert" role="alert" style="display: none;">
                        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                        <span class="alert-inner--text"><strong class="mi_alert_text"></strong></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php }?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Email</th>
                            <th>Document Info</th>
                            <th>Document Files</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            function get_user_info($db, $id, $perem){
                                $sql = "SELECT `name`, `email` FROM company WHERE id = '$id'";
                                $res = mysqli_query($db, $sql);

                                if ($res){
                                    $fet = mysqli_fetch_assoc($res);
                                    if ($perem == 'name'){
                                        return $fet['name'];
                                    }elseif ($perem == 'email'){
                                        return $fet['email'];
                                    }
                                }else{
                                    return false;
                                }

                            }

                            $bsql = "SELECT * FROM verification_v WHERE com_id = '".$_SESSION['uid']."'";
                            $bres = mysqli_query($db, $bsql);

                            while ($bfet = mysqli_fetch_array($bres)){
                        ?>
                            <tr>
                                <th><?=get_user_info($db, $bfet['user_id'], 'name');?></th>
                                <th>
                                    <?=get_user_info($db, $bfet['user_id'], 'email');?>
                                </th>
                                <th><?=$bfet['req_doc_info'];?></th>
                                <th>
                                    <?php
                                    $docimgs = explode(', ', $bfet['req_doc']);
                                    foreach ($docimgs as $immg){
                                        echo "<a href='assets/verification_doc/".$immg."' download><img src='assets/verification_doc/".$immg."' class='rounded-circle' style='width:35px; height:35px; margin-right: 5px;'></a>";
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php if ($bfet['doc_status'] == 0){?>
                                        <a href="vreqt.php?ac=<?=$bfet['id'];?>" class="btn btn-1 btn-success btn-sm">Accept Request</a>
                                    <?php }elseif($bfet['doc_status'] == 1){?>
                                        <a href="vreqt.php?vf=<?=$bfet['id'];?>" class="btn btn-1 btn-primary btn-sm">Verify Request</a>
                                    <?php }elseif($bfet['doc_status'] == 2){?>
                                        <label class="badge badge-primary">Verified Already</label>
                                    <?php }?>
                                </th>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
  </main>

<?php
include_once "includs/footer.php";
?>