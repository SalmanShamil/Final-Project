<?php

include_once "includs/header.php";

if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
    header('Location: login.php');
}
if (empty($_SESSION['utype']) || $_SESSION['utype'] != 'verifier'){
    header('Location: logout.php');
}
if (isset($fet['type']) && $fet['type'] != 'sublevel'){
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
                        All of documents for verification
                        <a class="btn btn-1 btn-primary btn-sm pull-right text-white" href="add_verification_verif.php">Add Document &nbsp;<i class="fa fa-plus"></i></a>
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
                                <th>Document title</th>
                                <th>Verifier</th>
                                <th>Document Submitted</th>
                                <th>Documents</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $bsql = "SELECT * FROM verification_v WHERE user_id = '".$_SESSION['uid']."'";
                            $bres = mysqli_query($db, $bsql);

                            while ($bfet = mysqli_fetch_array($bres)){
                                ?>
                                <tr>
                                    <td><?=$bfet['req_doc_info'];?></td>
                                    <td><?=verifier_name_get($db, $bfet['com_id']);?></td>

                                    <td><?=date('d-M-Y', strtotime($bfet['req_submitted']));?></td>
                                    <td>
                                        <?php
                                            $docimgs = explode(', ', $bfet['req_doc']);
                                            foreach ($docimgs as $immg){
                                                echo "<a href='assets/verification_doc/".$immg."' download><img src='assets/verification_doc/".$immg."' class='rounded-circle' style='width:35px; height:35px; margin-right: 5px;'></a>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($bfet['doc_status'] == 0){?>
                                            <span class="badge badge-pill badge-danger text-uppercase">Not Accepted Yet</span>
                                        <?php }elseif($bfet['doc_status'] == 1){?>
                                            <span class="badge badge-pill badge-warning text-uppercase">Pending</span>
                                        <?php }elseif($bfet['doc_status'] == 2){?>
                                            <span class="badge badge-pill badge-primary text-uppercase">Verified</span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <button type="button" value="<?=$bfet['id'];?>" class="btn btn-1 btn-danger btn-sm delBtn" data-toggle="modal" data-target="#modal-notification"><i class="fa fa-recycle"></i></button>
                                    </td>
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
                        <p>Do you really want to delete this Document?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="confirm_deletion">
                        <input class="hidden_verify_id" type="hidden" name="verifyid">
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

                $('.hidden_verify_id').val(mrid);
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
                            window.location.href = "http://localhost/ruk/verification.php";
                        }, 3000);
                    },
                    error:function () {
                        $('.mi_alert_text').html('Something is wrong. Please try again');
                        $('.mi_alert').show();
                        $('.loader').hide();
                        setTimeout(function() {
                            window.location.href = "http://localhost/ruk/verification.php";
                        }, 3000);
                    }
                });

            })
        });
    </script>
<?php
include_once "includs/footer.php";
?>