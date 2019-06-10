<?php

include_once "includs/header.php";

if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
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
                All of your Boards
                <a class="btn btn-1 btn-primary btn-sm pull-right text-white" href="add_board.php">Add Board &nbsp;<i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="alert alert-info alert-dismissible fade show mi_alert" role="alert" style="display: none;">
                    <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                    <span class="alert-inner--text"><strong class="mi_alert_text"></strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Board title</th>
                            <th>Board type</th>
                            <th>Board added</th>
                            <th>Board Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bsql = "SELECT * FROM board WHERE user_id = '".$_SESSION['uid']."'";
                            $bres = mysqli_query($db, $bsql);

                            while ($bfet = mysqli_fetch_array($bres)){
                        ?>
                            <tr>
                                <th><?=$bfet['board_name'];?></th>
                                <th>
                                    <?php if ($bfet['type'] == 1){?>
                                        <span class="badge badge-pill badge-info text-uppercase">Public</span>
                                    <?php }elseif($bfet['type'] == 2){?>
                                        <span class="badge badge-pill badge-primary text-uppercase">Private</span>
                                    <?php }?>
                                </th>
                                <th><?=date('d-M-Y', strtotime($bfet['added']));?></th>
                                <th>
                                    <?php if ($bfet['default'] == 1){?>
                                        <span class="badge badge-pill badge-primary text-uppercase">Default</span>
                                    <?php }elseif($bfet['default'] == 2){?>
                                        <span class="badge badge-pill badge-danger text-uppercase">Not Default</span>
                                    <?php }?>
                                </th>
                                <th>
                                    <a href="edit_board.php?vid=<?=$bfet['id'];?>" class="btn btn-1 btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" value="<?=$bfet['id'];?>" class="btn btn-1 btn-danger btn-sm delBtn" data-toggle="modal" data-target="#modal-notification"><i class="fa fa-trash"></i></button>
                                    <button type="button" value="<?="http://".$_SERVER['HTTP_HOST']."/ruk/view_user_private.php?sid=".$bfet['sid']."&uid=".$bfet['user_id'];?>" class="btn btn-1 btn-success btn-sm copy_privat_board_url"><i class="fa fa-copy"></i></button>
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
        $('.delBtn').click(function (e) {
            e.preventDefault();

           var mrid = $(this).val();

           $('.hidden_board_id').val(mrid);
        });

        $('#confirm_deletion').on('submit', function (e) {
            e.preventDefault();
            $('.dismisMod').trigger('click');

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
                        window.location.href = "http://localhost/ruk/boards.php";
                    }, 3000);
                },
                error:function () {
                    $('.mi_alert_text').html('Something is wrong. Please try again');
                    $('.mi_alert').show();
                    $('.loader').hide();
                    setTimeout(function() {
                        window.location.href = "http://localhost/ruk/boards.php";
                    }, 3000);
                }
            });

        });

        $('.copy_privat_board_url').click(function (e) {
            e.preventDefault();
            var url = $(this).val();
            $('.mi_alert_text').html("Copy Url: "+url);
            $('.mi_alert').show();
        })
    });
</script>
<?php
include_once "includs/footer.php";
?>