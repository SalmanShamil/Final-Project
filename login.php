<?php
  include_once "includs/header.php";
?>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Sign in with credentials</small>
                </div>
                <form role="form" id="mi_login_form">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password" name="password">
                    </div>
                  </div>

                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                            </div>
                            <select class="form-control" name="usr_type" id="urs_tp">
                                <option value="user">User</option>
                                <option value="veri">Verifier</option>
                            </select>
                        </div>
                    </div>
                  <div class="custom-control custom-control-alternative custom-checkbox">
                  </div>
                    <div class="alert alert-info alert-dismissible fade show mi_alert_2" role="alert" style="display: none;">
                        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                        <span class="alert-inner--text"><strong class="mi_alert_text_2"></strong></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <input type="hidden" name="login_form" value="1">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4"><i class="fa fa-sign-in"></i>&nbsp;Sign in</button>
                    <a href="register.php" class="btn btn-darker my-4"><i class="fa fa-user-plus"></i>&nbsp;Sign up</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light">
                  <small>Forgot password?</small>
                </a>
              </div>
              <div class="col-6 text-right">
                <a href="register.php" class="text-light">
                  <small>Create new account</small>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<script>
    $('#mi_login_form').submit(function (e) {
        e.preventDefault();
        $('.loader2').html('<img src="assets/loadingblue.gif" style="width: 30px;height: 30px;">');
        var data = $('#mi_login_form').serialize();
        $.ajax({
            type:'post',
            url:'actions.php',
            data:data,
            success:function(data){
                $('.mi_alert_text_2').html(data);
                $('.mi_alert_2').show();
                $('.loader2').hide();
                if (data = 'Signup Successfully'){
                    setTimeout(function() {
                        window.location.href = "http://localhost/ruk/profile.php";
                    }, 3000);
                }
            },
            error:function () {
                $('.mi_alert_text_2').html('Something is wrong. Please try again');
                $('.mi_alert_2').show();
                $('.loader2').hide();
                setTimeout(function() {
                    window.location.href = "http://localhost/ruk/login.php";
                }, 3000);
            }
        });
    });
</script>
<?php
include_once "includs/footer.php";
?>