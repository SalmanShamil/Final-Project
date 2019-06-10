<?php include_once 'includes/header.php';?>
<?php
if (isset($_POST['save_package']) || isset($_POST['up_package'])){
    $name = mysqli_real_escape_string($db, $_POST['pname']);
    $point = mysqli_real_escape_string($db, $_POST['ppoint']);
    $price = mysqli_real_escape_string($db, $_POST['pprice']);
    if (empty($name) || empty($point) || empty($price)){
        $_SESSION['msg'] = "All the fields are required";
    }else{

        if (isset($_POST['up_package'])){
            $pid = mysqli_real_escape_string($db, $_POST['id']);
            $sql = "UPDATE point_package SET pk_title = '$name', pk_point = '$point', pk_price = '$price' WHERE pk_id = '$pid'";
            $res = mysqli_query($db, $sql);
            if ($res){
                $_SESSION['msg'] = "Package Updated successfully";
            }else{
                $_SESSION['msg'] = "Error to Update Package";
            }

        }else{
            $sql = "INSERT INTO point_package(pk_title, pk_point, pk_price) VALUES('$name', '$point', '$price')";
            $res = mysqli_query($db, $sql);
            if ($res){
                $_SESSION['msg'] = "Package saved successfully";
            }else{
                $_SESSION['msg'] = "Error to save Package";
            }
        }
    }
}

if (isset($_GET['edit'])){
    $id = mysqli_real_escape_string($db, $_GET['edit']);

    $fetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `point_package` WHERE `pk_id` = '$id'"));
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
                  <h3 class="mb-0">Add Point Package</h3>
                </div>
              </div>
            </div>
            <div class="col-12 pb-5">
              <!-- Projects table -->

                <?php if (!isset($id)){?>
                <form action="single-package.php" method="post">
                <?php }else{?>
                    <form action="single-package.php?edit=<?=$id;?>" method="post">
                        <input type="hidden" name="id" value="<?=$id;?>">
                    <?php }?>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Package Name</label>
                                    <input type="text" id="input-username" class="form-control form-control-alternative" name="pname" placeholder="Package Name" value="<?=(!empty($fetch['pk_title']))?$fetch['pk_title']:'';?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Package Points</label>
                                    <input type="number" id="input-email" class="form-control form-control-alternative" name="ppoint" placeholder="Package Points" value="<?=(!empty($fetch['pk_point']))?$fetch['pk_point']:'';?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-point">Package Price</label>
                                    <input type="number" id="input-point" class="form-control form-control-alternative" name="pprice" placeholder="Package Price" value="<?=(!empty($fetch['pk_price']))?$fetch['pk_price']:'';?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <?php if (!isset($id)){?>
                            <button class="btn btn-primary" type="submit" name="save_package">Save Package</button>
                        <?php }else{?>
                            <button class="btn btn-primary" type="submit" name="up_package">Update Package</button>
                        <?php }?>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>


<?php include_once 'includes/footer.php';?>