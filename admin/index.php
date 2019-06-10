<?php include_once 'includes/header.php';?>
<?php

function admin_user_qty($db){
    $sql = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `users`"));
    return $sql;
}
function admin_company_qty($db){
    $sql = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `company`"));
    return $sql;
}
function admin_transections_qty($db){
    $sql = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user_got_points`"));
    return $sql;
}
function admin_boards_qty($db){
    $sql = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `board`"));
    return $sql;
}

?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include_once 'includes/nav.php';?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                      <span class="h2 font-weight-bold mb-0"><?=admin_user_qty($db);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Transaction</h5>
                      <span class="h2 font-weight-bold mb-0"><?=admin_transections_qty($db);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Companies</h5>
                      <span class="h2 font-weight-bold mb-0"><?=admin_company_qty($db);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Boards</h5>
                      <span class="h2 font-weight-bold mb-0"><?=admin_boards_qty($db);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-6 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Users Sign Up</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Signup Time</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $usql = mysqli_query($db, "SELECT * FROM `users` ORDER BY id DESC LIMIT 7");
                    while ($urow = mysqli_fetch_assoc($usql)){
                ?>
                  <tr>
                        <td><?=$urow['name'];?></td>
                        <td><?=$urow['email'];?></td>
                        <td><?=$urow['designation'];?></td>
                        <td><?=$urow['signup_date'];?></td>
                  </tr>
                  <?php }?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Verifier Signup</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Email</th>
                    <th scope="col">Company Type</th>
                    <th scope="col">Signup Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $csql = mysqli_query($db, "SELECT * FROM `company` ORDER BY id DESC LIMIT 7");
                while ($crow = mysqli_fetch_assoc($csql)){
                    ?>
                    <tr>
                        <td><?=$crow['name'];?></td>
                        <td><?=$crow['email'];?></td>
                        <td><?=($crow['type'] == "sublevel")?'<div class="badge badge-primary">Sub Level</div>':'<div class="badge badge-success">Top Level</div>';?></td>
                        <td><?=$crow['signup_date'];?></td>
                    </tr>
                <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


<?php include_once 'includes/footer.php';?>