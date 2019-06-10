<?php include_once 'includes/header.php';
if (isset($_POST['save_user'])){
    $name = mysqli_real_escape_string($db,$_POST['uname']);
    $phone = mysqli_real_escape_string($db,$_POST['uphone']);
    $email = mysqli_real_escape_string($db,$_POST['uemail']);
    $pass = mysqli_real_escape_string($db, md5($_POST['upass']));
    $adds = mysqli_real_escape_string($db, $_POST['uaddress']);
    $country = mysqli_real_escape_string($db,$_POST['ucountry']);
    $dob = date('Y-m-d', strtotime($_POST['udob']));
    $desig = mysqli_real_escape_string($db, $_POST['udesig']);
    $bio = mysqli_real_escape_string($db, $_POST['ubio']);

    $dt = date("Y-m-d");

    $msg = "";
    if (empty($name)){
        $msg = "Email cannot be Empty";
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
        $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res)>0){
            $msg = "User Already Exists";
        }else{

            $picture = $_FILES['uimg']['name'];
            $pathUp = "../assets/signup_images/";
            $perem = md5(date("YmdHis"));
            $mainimg = $perem.$picture;

            if (move_uploaded_file($_FILES['uimg']['tmp_name'], $pathUp.$mainimg)){
                $query = "INSERT INTO users(`name`, `email`, `pass`, `phone`, `dob`, `country`, `address`, `designation`, `bio`, `picture`) 
                                        VALUES('$name', '$email', '$pass', '$phone', '$dob', '$country', '$adds', '$desig', '$bio', '$mainimg')";
            }else{
                $msg = "Image Not Uploaded";
            }

            if (mysqli_query($db, $query)){
                $msg = "User Added Successfully";
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
    <form action="user-single.php" method="post" enctype="multipart/form-data" style="width: 100%;">

    <div class="row">
          <?php if (!empty($msg)){?>
                <div class="alert alert-success" style="position: absolute; top: 10%;"><?=$msg;?></div>
          <?php }?>
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
              <div class="card-body pt-0 pt-6" style="background: #f7fafc;">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label class="form-control-label" for="input-username">Upload User Image</label>
                              <input type="file" class="form-control form-control-alternative" placeholder="User Image" name="uimg">
                          </div>
                          <div class="form-group">
                              <label class="form-control-label" for="input-username">User Password</label>
                              <input type="password" class="form-control form-control-alternative" placeholder="User Password" name="upass">
                          </div>
                          <div class="form-group">
                              <label>Users Biography</label>
                              <textarea rows="13" name="ubio" class="form-control form-control-alternative" placeholder="A few words about user ..."></textarea>
                          </div>
                      </div>
                  </div>
              </div>

              <button name="save_user" type="submit" class="btn btn-primary btn-lg">Save User Info</button>

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
                        <label class="form-control-label" for="input-last-name">Date of birth</label>
                        <input type="date" id="input-last-name" class="form-control form-control-alternative" placeholder="Date of Birth" name="udob">
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
                        <label class="form-control-label" for="input-country">Designation</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="User Designation" name="udesig">
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