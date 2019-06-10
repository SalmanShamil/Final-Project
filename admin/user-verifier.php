<?php include_once 'includes/header.php';
if (isset($_POST['save_verifier'])){
    $name = mysqli_real_escape_string($db,$_POST['uname']);
    $phone = mysqli_real_escape_string($db,$_POST['uphone']);
    $email = mysqli_real_escape_string($db,$_POST['uemail']);
    $pass = mysqli_real_escape_string($db, md5($_POST['upass']));
    $adds = mysqli_real_escape_string($db, $_POST['uaddress']);
    $country = mysqli_real_escape_string($db,$_POST['ucountry']);
    $dob = date('Y-m-d', strtotime($_POST['udob']));
    $desig = mysqli_real_escape_string($db, $_POST['udesig']);
    $type = mysqli_real_escape_string($db, $_POST['utype']);

    $dt = date("Y-m-d");

    $msg = "";
    if (empty($name)){
        $msg = "Name cannot be Empty";
    }elseif (empty($email)){
        echo "Email cannot be Empty";
    }elseif (empty($pass)){
        $msg = "Password cannot be empty";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = "Email is not valid";
    }elseif (empty($phone)){
        $msg = "Phone number is required";
    }elseif (strlen($phone) != 11){
        $msg = "Phone number must be 11 digit";
    }elseif (empty($adds)){
        $msg = "Address is required";
    }elseif (empty($country)){
        $msg = "Please Choose Country";
    }else{
        $sql = "SELECT * FROM company WHERE email = '$email' OR phone = '$phone'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res)>0){
            $msg = "User Already Exists";
        }else{

            $picture = $_FILES['uimg']['name'];
            $pathUp = "../assets/signup_images/";
            $perem = md5(date("YmdHis"));
            $mainimg = $perem.$picture;

            if (move_uploaded_file($_FILES['uimg']['tmp_name'], $pathUp.$mainimg)){

                $query = "INSERT INTO company(`name`, `email`, `pass`, `phone`, `started`, `country`, `address`, `main_task`, `logo`, `type`, `signup_date`) 
                                        VALUES('$name', '$email', '$pass', '$phone', '$dob', '$country', '$adds', '$desig', '$mainimg','$type', $dt)";
            }else{
                $msg = "Image Not Uploaded";
            }

            if (mysqli_query($db, $query)){
                $msg = "Verifier Added Successfully";
            }else{
                $msg = "Error to add user";
            }
        }
    }
}

if (isset($_GET['edit'])){
    $usql = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '".$_GET['edit']."'");
    if ($usql){
        $urow = mysqli_fetch_assoc($usql);
    }else{
        header("Location: users.php");
    }
}

?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include_once 'includes/nav.php';?>

<?php if (isset($_GET['edit'])){?>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->

        <div class="container-fluid d-flex align-items-center">
    <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Jesse</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-info">Edit profile</a>
          </div>
        </div>

      </div>

    </div>
<?php }else{?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <?php }?>

    <!-- Page content -->
    <div class="container-fluid mt-7">
    <form action="user-verifier.php" method="post" enctype="multipart/form-data" style="width: 100%;">

    <div class="row">
          <?php if (!empty($msg)){?>
                <div class="alert alert-success" style="position: absolute; top: 10%;"><?=$msg;?></div>
          <?php }?>
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <?php if (isset($_GET['edit'])){?>
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <?php }?>
            <?php if (isset($_GET['edit'])){?>
            <div class="card-body pt-0 pt-6">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  Jessica Jones<span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4" />
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
              </div>
            </div>
            <?php }else{?>
            <div class="card-body pt-0 pt-6" style="background: #f7fafc;">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Upload Verifier Logo</label>
                            <input type="file" class="form-control form-control-alternative" placeholder="User Image" name="uimg">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Verifier Password</label>
                            <input type="password" class="form-control form-control-alternative" placeholder="User Password" name="upass">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Verifier Type</label>
                            <select class="form-control form-control-alternative" name="utype">
                                <option>Choose Verifier Type</option>
                                <option value="sublevel">Sub Level</option>
                                <option value="toplevel">Top Level</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>

              <button name="save_verifier" type="submit" class="btn btn-primary btn-lg">Save Verifier Info</button>

          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add User</h3>
                </div>
              </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">User Name</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="User Name" name="uname">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" name="uemail">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Phone</label>
                        <input type="number" id="input-first-name" class="form-control form-control-alternative" placeholder="User Phone number" name="uphone">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Started</label>
                        <input type="date" id="input-last-name" class="form-control form-control-alternative" placeholder="Started" name="udob">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" name="uaddress" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" name="ucountry">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Main Task</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="Main Task" name="udesig">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>


      </div>
    </form>


<?php include_once 'includes/footer.php';?>