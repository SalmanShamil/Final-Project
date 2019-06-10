<?php include_once 'includes/header.php';?>
<?php
function admin_boards_user($db, $id){
    $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id'"));
    return $sql;
}
function admin_package_user($db, $id){
    $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `point_package` WHERE `pk_id` = '$id'"));
    return $sql;
}

if (isset($_POST['del'])){
    $id = mysqli_real_escape_string($db, $_POST['del']);
    $res = mysqli_query($db, "DELETE FROM `user_got_points` WHERE `id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Transaction Deleted Successfully";
    }else{
        $_SESSION['msg'] = "Transaction Not Deleted";
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
                  <h3 class="mb-0">All Users Transection Details</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Package Point</th>
                    <th scope="col">Package Price</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Card Name</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">Card Expiery</th>
                    <th scope="col">Card CVV</th>
                    <th scope="col">Transection Time</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `user_got_points` ORDER BY id DESC");
                    $i = 1;
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$i;?></td>
                        <td><?=admin_package_user($db, $urow['point_pkg_id'])['pk_title'];?></td>
                        <td><?=admin_package_user($db, $urow['point_pkg_id'])['pk_point'];?></td>
                        <td>BDT <?=admin_package_user($db, $urow['point_pkg_id'])['pk_price'];?></td>
                        <td><?=admin_boards_user($db, $urow['user_id'])['email'];?></td>
                        <td><?=$urow['c_name'];?></td>
                        <td><?=$urow['c_number'];?></td>
                        <td><?=$urow['c_expiry'];?></td>
                        <td><?=$urow['c_cvv'];?></td>
                        <td><?=$urow['package_date'];?></td>
                        <td>
                            <a href="userstransections.php?del=<?=$urow['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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