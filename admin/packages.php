<?php include_once 'includes/header.php';?>
<?php
if (isset($_GET['del'])){
    $id = mysqli_real_escape_string($db, $_GET['del']);
    $res = mysqli_query($db, "DELETE FROM `point_package` WHERE `pk_id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Package Deleted Successfully";
    }else{
        $_SESSION['msg'] = "Package Not Deleted";
    }
}

if (isset($_GET['ds'])){
    $id = mysqli_real_escape_string($db, $_GET['ds']);
    $res = mysqli_query($db, "UPDATE `point_package` SET `status` = '0' WHERE `pk_id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Package Deactivated Successfully";
    }else{
        $_SESSION['msg'] = "Package Not Deactivated";
    }
}

if (isset($_GET['as'])){
    $id = mysqli_real_escape_string($db, $_GET['as']);
    $res = mysqli_query($db, "UPDATE `point_package` SET `status` = '1' WHERE `pk_id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Package Activated Successfully";
    }else{
        $_SESSION['msg'] = "Package Not Activated";
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
                <div class="col btn-block">
                  <h3 class="mb-0 float-left">All Point Packages</h3>
                    <a href="single-package.php" class="btn btn-sm btn-primary float-right">Add Package</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Package Title</th>
                    <th scope="col">Package Point</th>
                    <th scope="col">Package Price</th>
                    <th scope="col">Package Status</th>
                    <th scope="col">Package Added</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `point_package` ORDER BY pk_id DESC");
                    $i = 1;
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$i;?></td>
                        <td><?=$urow['pk_title'];?></td>
                        <td><?=$urow['pk_point'];?></td>
                        <td>BDT <?=$urow['pk_price'];?></td>
                        <td><?=($urow['status'] == 1)?
                                '<div class="badge badge-success">Activated</div><br><a href="packages.php?ds='.$urow['pk_id'].'" class="btn btn-sm btn-danger mt-2">Deactivate it</a>':
                                '<div class="badge badge-danger">Deactivated</div><br><a href="packages.php?as='.$urow['pk_id'].'" class="btn btn-sm btn-primary mt-2">Activate it</a>';
                        ?></td>
                        <td><?=$urow['pk_added'];?></td>
                        <td>
                            <a href="single-package.php?edit=<?=$urow['pk_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="packages.php?del=<?=$urow['pk_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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