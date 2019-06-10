<?php include_once 'includes/header.php';?>
<?php
if (isset($_POST['del'])){
    $id = mysqli_real_escape_string($db, $_POST['del']);
    $res = mysqli_query($db, "DELETE FROM `users` WHERE `id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Users Deleted Successfully";
    }else{
        $_SESSION['msg'] = "Users Not Deleted";
    }
}

?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include_once 'includes/nav.php';?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
<?php if (isset($_SESSION['msg'])){echo "<div class='alert alert-primary'>".$_SESSION['msg']."</div>"; unset($_SESSION['msg']);}?>

    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 float-left">All Users Details</h3>
                    <a href="user-single.php" class="btn btn-sm btn-primary float-right">Add Users</a>

                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                      <th scope="col">Picture</th>

                      <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Points</th>
                    <th scope="col">Status</th>
                    <th scope="col">Signup Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `users` ORDER BY id DESC");
                    $i = 1;
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$i;?></td>
                        <td><img src="../assets/signup_images/<?=$urow['picture'];?>" class="img-fluid img-thumbnail" style="width: 80px;"></td>
                        <td><?=$urow['name'];?></td>
                        <td><?=$urow['email'];?></td>
                        <td><?=$urow['phone'];?></td>
                        <td><?=$urow['address'];?></td>
                        <td><?=$urow['designation'];?></td>
                        <td><?=$urow['mypoints'];?></td>
                        <td><?=($urow['status'] == 0)?'<div class="badge badge-danger">Dactivated</div>':'<div class="badge badge-primary">Activated</div>';?></td>
                        <td><?=$urow['signup_date'];?></td>
                        <td>
                            <a href="users.php?del=<?=$urow['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                  </tr>
                  <?php $i++;}?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


<?php include_once 'includes/footer.php';?>