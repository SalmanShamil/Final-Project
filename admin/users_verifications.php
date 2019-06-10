<?php include_once 'includes/header.php';?>

<?php
function admin_boards_user($db, $id){
    $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id'"));
    return $sql;
}
function admin_company_user($db, $id){
    $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `company` WHERE `id` = '$id'"));
    return $sql;
}

if (isset($_POST['del'])){
    $id = mysqli_real_escape_string($db, $_POST['del']);
    $res = mysqli_query($db, "DELETE FROM `verification` WHERE `id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Verification Deleted Successfully";
    }else{
        $_SESSION['msg'] = "Verification Not Deleted";
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

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">All Users Verification Requests</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Verification Title</th>
                    <th scope="col">Vrification Documents</th>
                    <th scope="col">Document Status</th>
                    <th scope="col">Request User</th>
                    <th scope="col">Verifier Company</th>
                    <th scope="col">Request Submitted</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `verification` ORDER BY `id` DESC");
                    $i = 1;
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$i;?></td>
                        <td><?=$urow['req_doc_info'];?></td>
                        <td>
                            <?php
                            $docimgs = explode(', ', $urow['req_doc']);
                            foreach ($docimgs as $immg){
                                echo "<a href='../assets/verification_doc/".$immg."' download><img src='../assets/verification_doc/".$immg."' class='rounded-circle' style='width:35px; height:35px; margin-right: 5px;'></a>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($urow['doc_status'] == 0){?>
                                <span class="badge badge-pill badge-danger text-uppercase">Not Accepted Yet</span>
                            <?php }elseif($urow['doc_status'] == 1){?>
                                <span class="badge badge-pill badge-warning text-uppercase">Pending</span>
                            <?php }elseif($urow['doc_status'] == 2){?>
                                <span class="badge badge-pill badge-primary text-uppercase">Verified</span>
                            <?php }?>
                        </td>
                        <td><?=admin_boards_user($db, $urow['user_id'])['email'];?></td>
                        <td><?=admin_company_user($db, $urow['com_id'])['email'];?></td>
                        <td><?=$urow['req_submitted'];?></td>
                        <td>
                            <a href="users_verifications.php?del=<?=$urow['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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