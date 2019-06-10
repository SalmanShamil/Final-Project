<?php

include_once "includs/header.php";

if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
    header('Location: login.php');
}
?>
<style>
    .richText-toolbar ul{
        padding-left: 0px;
        margin-bottom: 0px;
    }
</style>

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
                Add New Board
            </div>
            <div class="card-body">
                <div class="alert alert-info alert-dismissible fade show mi_alert" role="alert" style="display: none;">
                    <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                    <span class="alert-inner--text"><strong class="mi_alert_text"></strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form role="form" id="board_add_mi" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-tag"></i></span>
                            </div>
                            <input class="form-control" placeholder="Enter Board Title" type="text" name="board_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Board Type</strong></label>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="board_type" class="custom-control-input" id="customRadio1" type="radio" value="1" checked>
                                    <label class="custom-control-label" for="customRadio1">
                                        <span>Public</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="board_type" class="custom-control-input" id="customRadio2" type="radio" value="2">
                                    <label class="custom-control-label" for="customRadio2">
                                        <span>Private</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Board Status</strong></label>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="board_status" class="custom-control-input" id="customRadio11" type="radio" value="1">
                                    <label class="custom-control-label" for="customRadio11">
                                        <span>Default</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                    <input name="board_status" class="custom-control-input" id="customRadio22" type="radio" value="2" checked>
                                    <label class="custom-control-label" for="customRadio22">
                                        <span>Not Default</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <?php

                                $sqlv = "SELECT * FROM `verification` WHERE `user_id` = '".$fet['id']."'";
                                $resv = mysqli_query($db, $sqlv);

                                if (mysqli_num_rows($resv)>0){
                                    echo '<div class="col-md-12"><label><strong>Choose Documents on the board</strong></label></div>';

                                    while ($fetv = mysqli_fetch_assoc($resv)){
                            ?>
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" id="chkkk<?=$fetv['id'];?>" class="custom-control-input" name="verific_id[]" value="<?=$fetv['id'];?>">
                                    <label for="chkkk<?=$fetv['id'];?>" class="custom-control-label"><?=$fetv['req_doc_info'];?></label>
                                </div>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Please Add your Board Content" rows="10" name="board_content" id="edit">Please Add your Board Content</textarea>
                    </div>

                    <input name="usr_board_id" type="hidden" value="<?=(!empty($fet['id']))?$fet['id']:'';?>">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4 btn-lg" name="board_submit"><i class="fa fa-save"></i>&nbsp;Save Board &nbsp;<span class="loader"></span></button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </main>
    <div class="modal fade show" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none; padding-right: 17px;">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>Do you really want to delete this board?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="confirm_deletion">
                        <input class="hidden_board_id" type="hidden" name="brdid">
                        <button type="submit" class="btn btn-white">Yes, Delete</button>
                    </form>
                    <button type="button" class="btn btn-link text-white ml-auto dismisMod" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
        $('#board_add_mi').on('submit', function (e) {
            e.preventDefault();
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
                        window.location.href = "http://localhost/ruk/add_board.php";
                    }, 3000);
                },
                error:function () {
                    $('.mi_alert_text').html('Something is wrong. Please try again');
                    $('.mi_alert').show();
                    $('.loader').hide();
                    setTimeout(function() {
                        window.location.href = "http://localhost/ruk/add_board.php";
                    }, 3000);
                }
            });

        })
    });
</script>

<?php
include_once "includs/footer.php";
?>