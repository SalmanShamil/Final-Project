<?php include_once 'includes/header.php';?>
<?php
function admin_boards_user($db, $id){
    $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id'"));
    return $sql;
}
if (isset($_POST['del'])){
    $id = mysqli_real_escape_string($db, $_POST['del']);
    $res = mysqli_query($db, "DELETE FROM `board` WHERE `id` = '$id'");
    if ($res){
        $_SESSION['msg'] = "Board Deleted Successfully";
    }else{
        $_SESSION['msg'] = "Board Not Deleted";
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
                  <h3 class="mb-0">All Users Board Details</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Board User Email</th>
                    <th scope="col">Board Name</th>
                    <th scope="col">Board Sid</th>
                    <th scope="col">Board Type</th>
                    <th scope="col">Board Status</th>
                    <th scope="col">Board Added</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `board` ORDER BY id DESC");
                    $i = 1;
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$i;?></td>
                        <td><?=admin_boards_user($db, $urow['user_id'])['email'];?></td>
                        <td><?=$urow['board_name'];?></td>
                        <td><?=$urow['sid'];?></td>
                        <td><?=($urow['type'] == 1)?'<div class="badge badge-success">Public</div>':'<div class="badge badge-dark">Private</div>';?></td>
                        <td><?=($urow['default'] == 1)?'<div class="badge badge-success">Default</div>':'<div class="badge badge-danger">Not Default</div>';?></td>
                        <td><?=$urow['added'];?></td>
                        <td>
                            <a href="boards.php?del=<?=$urow['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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