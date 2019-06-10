<?php
    include_once "includs/header.php";

if (empty($_SESSION['utype']) || $_SESSION['utype'] == 'verifier'){
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
          <div class="card-header">
            Hello <?=$fet['name'];?>, Edit Your Profile Here
          </div>
            <div class="card-body">
                <form role="form" id="user_doc_verification" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-tag"></i></span>
                            </div>
                            <input class="form-control" placeholder="Document Name" type="text" name="doc_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                            </div>
                            <select class="form-control" name="verifier">
                                <option>Choose Verifier</option>
                                <?php
                                    $csql = "SELECT * FROM company WHERE status = 1 AND `type` = 'sublevel' ORDER BY id DESC";
                                    $cres = mysqli_query($db, $csql);
                                    while ($cfet = mysqli_fetch_array($cres)){
                                ?>
                                        <option value="<?=$cfet['id'];?>"><?=$cfet['name'];?> | <?=$cfet['main_task'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Choose Documents Picture</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-image"></i></span>
                            </div>
                            <input type="file" name="docs_img[]" aria-label="Large" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <div class="custom-control custom-control-alternative custom-checkbox">

                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible fade show mi_alert" role="alert" style="display: none;">
                        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                        <span class="alert-inner--text"><strong class="mi_alert_text"></strong></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                        <input name="doc_u_id" type="hidden" value="<?=(!empty($fet['id']))?$fet['id']:'';?>">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4 btn-lg" name="verify_submit" value="1"><i class="ni ni-check-bold"></i>&nbsp;Submit Your Document &nbsp;<span class="loader"></span></button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </main>


<script>
    $(document).ready(function () {
        $('#user_doc_verification').on('submit', function (e) {
            e.preventDefault();
            $('.loader').html('<img src="assets/loadingblue.gif" style="width: 30px;height: 30px;">');
            $.ajax({
                type:'post',
                url:'actions.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){
                    $('.mi_alert_text').html(data);
                    $('.mi_alert').show();
                    $('.loader').hide();
                    setTimeout(function() {
                        window.location.href = "http://localhost/ruk/add_verification.php";
                    }, 3000);
                },
                error:function () {
                    $('.mi_alert_text').html('Something is wrong. Please try again');
                    $('.mi_alert').show();
                    $('.loader').hide();
                    setTimeout(function() {
                        window.location.href = "http://localhost/ruk/add_verification.php";
                    }, 3000);
                }
            });
        });
    })
</script>

<?php
include_once "includs/footer.php";
?>