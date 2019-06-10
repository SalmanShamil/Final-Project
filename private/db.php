<?php
session_start();

$db = mysqli_connect('localhost','root','','rukon');
if(mysqli_connect_errno()){
    echo 'Database connection failed: '. mysqli_connect_error();
    die();
}


function verifier_name_get($db, $id){
    $sql = "SELECT name FROM company WHERE id = '$id'";
    $res = mysqli_query($db, $sql);
    if (mysqli_num_rows($res)>0) {
        $fet = mysqli_fetch_assoc($res);
        return $fet['name'];
    }else{
        return false;
    }
}

function verification_items($db, $id, $usr){

    $vsql = "SELECT * FROM verification WHERE id = '$id' AND user_id = '".$usr."' ORDER BY id DESC";
    $vres = mysqli_query($db, $vsql);

    if (mysqli_num_rows($vres) > 0){

        while ($vfet = mysqli_fetch_array($vres)){
            echo '<div class="col-md-3 col-sm-6 text-center" style="padding: 5px; border: 1px solid #e3e3e3;">';

            if ($vfet['doc_status'] == 0){
                echo '<i class="fa fa-warning" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>';
            }elseif ($vfet['doc_status'] == 1){
                echo '<i class="fa fa-recycle" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>';
            }elseif ($vfet['doc_status'] == 2){
                echo '<i class="fa fa-check-square-o" style="font-size: 40px;color: darkolivegreen;margin-bottom: 5px;"></i>';
            }
            echo '<br>
                                <label>'.$vfet['req_doc_info'].'</label><br>';

            $docimgs = explode(', ', $vfet['req_doc']);
            foreach ($docimgs as $immg){
                echo "<a href='assets/verification_doc/".$immg."' download><img src='assets/verification_doc/".$immg."' class='rounded-circle' style='width:35px; height:35px; margin-right: 5px;'></a>";
            }

            echo '<br>
                                <label style="margin-top: 10px;">Verified By: <a href="view_verifier.php?vd='.$vfet['com_id'].'"><strong>'.verifier_name_get($db, $vfet['com_id']).'<br>(Sub Level Verifier)</strong></a></label>
                            </div>';

        }
    }else{
        echo '<h3>No Document Added For Verification Yet</h3>
                                        <a class="btn btn-sm btn-primary" href="add_verification.php">Add Now &nbsp;<i class="fa fa-chevron-right"></i></a>';
    }
}


function get_verification_checkbox($db, $id, $usr)
{
    $mid = explode(', ', $id);
    $sqlv = "SELECT * FROM `verification` WHERE `user_id` = '".$usr."'";
    $resv = mysqli_query($db, $sqlv);

    if (mysqli_num_rows($resv) > 0) {
        echo '<div class="col-md-12"><label><strong>Choose Documents on the board</strong></label></div>';

        $ar = array();
        $nm = array();

        $i = 0;
        while ($fet = mysqli_fetch_array($resv)){
            $ar[] = $fet['id'];
            $nm[] = $fet['req_doc_info'];
            $i++;
        }

        foreach ($ar as $k=>$a){
            if (in_array($a, $mid)){
                echo '<div class="col-md-4">
                     <div class="custom-control custom-checkbox mb-3">
                         <input type="checkbox" id="chkkk' .$a. '" class="custom-control-input" name="verific_id[]" value="' .$a. '" checked>
                         <label for="chkkk' .$a. '" class="custom-control-label">' .$nm[$k]. '</label>
                     </div>
                 </div>';
            }else{
                echo '<div class="col-md-4">
                     <div class="custom-control custom-checkbox mb-3">
                         <input type="checkbox" id="chkkk' .$a. '" class="custom-control-input" name="verific_id[]" value="' .$a. '">
                         <label for="chkkk' .$a. '" class="custom-control-label">' .$nm[$k]. '</label>
                     </div>
                 </div>';
            }
        }
    }
}