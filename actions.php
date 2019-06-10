<?php
require_once "private/db.php";

//Registration System Code
if (isset($_POST['usr_sign']) || !empty($_POST['usr_sign']) || isset($_POST['com_sign']) || !empty($_POST['com_sign'])){
    error_reporting(0);

    $name = mysqli_real_escape_string($db,$_POST['name']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $pass = mysqli_real_escape_string($db, md5($_POST['pass']));
    $adds = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $dob = date('Y-m-d', strtotime($_POST['dob']));

    if (isset($_POST['com_sign']) || !empty($_POST['com_sign'])){
        $comType = mysqli_real_escape_string($db, $_POST['verifier_type']);
        $task = mysqli_real_escape_string($db, $_POST['task']);

        if (empty($comType)){
            echo "Please choose verifier type";
            exit;
        }elseif (empty($task)){
            echo "Please Shortly Describe the company main task";
            exit;
        }
    }

    $dt = date("Y-m-d");

    if (empty($name)){
        echo "Email cannot be Empty";
        exit;
    }elseif (empty($email)){
        echo "Email cannot be Empty";
        exit;
    }elseif (empty($pass)){
        echo "Password cannot be empty";
        exit;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email is not valid";
        exit;
    }elseif (empty($phone)){
        echo "Phone number is required";
        exit;
    }elseif (strlen($phone) != 11){
        echo "Phone number must be 11 digit";
        exit;
    }elseif (empty($adds)){
        echo "Address is required";
        exit;
    }elseif (empty($country)){
        echo "Please Choose Country";
        exit;
    }else{

        if (isset($_POST['com_sign']) || !empty($_POST['com_sign'])){
            $sql2 = "SELECT * FROM company WHERE email = '$email' OR phone = '$phone'";
            $res2 = mysqli_query($db, $sql2);

            if (mysqli_num_rows($res)>0){
                echo "User Already Exists";
                exit;
            }else{
                $query = "INSERT INTO company(`name`, `email`, `pass`, `phone`, `started`, `country`, `address`, `main_task`, `type`, `signup_date`) 
                                  VALUES('$name', '$email', '$pass', '$phone', '$dob', '$country', '$adds', '$task', '$comType', '$dt')";
            }
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
            $res = mysqli_query($db, $sql);

            if (mysqli_num_rows($res)>0){
                echo "User Already Exists";
                exit;
            }else{
                $query = "INSERT INTO users(`name`, `email`, `pass`, `phone`, `dob`, `country`, `address`, `signup_date`) 
                                        VALUES('$name', '$email', '$pass', '$phone', '$dob', '$country', '$adds', '$dt')";
            }
        }


        $result = mysqli_query($db, $query);

        if ($result){
            echo "Signup Successfully";
            exit;
        }else{
            die(header("HTTP/1.0 404 Not Found"));
        }

    }
}




if (isset($_POST['login_form']) || !empty($_POST['login_form'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, md5($_POST['password']));
    $usr_type = mysqli_real_escape_string($db, $_POST['usr_type']);

    if (empty($usr_type)){
        echo "Please choose user type to signup";
        exit;
    }elseif (!empty($email) || !empty($pass)){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Email is not valid";
            exit;
        }else{

            if ($usr_type == 'user'){
                $query = "SELECT * FROM users WHERE email = '$email'";
                $ucon = "user";
            }else{
                $query = "SELECT * FROM company WHERE email = '$email'";
                $ucon = "verifier";
            }
            $done = mysqli_query($db, $query);

            if (mysqli_num_rows($done)>0){
                $fetch = mysqli_fetch_assoc($done);
                $u_id = $fetch['id'];
                $DBpass = $fetch['pass'];
                $DBactive = $fetch['status'];

                if ($DBactive != 0){
                    if ($pass == $DBpass){

                        if ($ucon == 'user'){
                            $_SESSION['uid'] = $u_id;
                            $_SESSION['utype'] = $ucon;

                            echo "Login Successful";
                            exit;
                        }elseif ($ucon == 'verifier'){
                            $_SESSION['uid'] = $u_id;
                            $_SESSION['utype'] = $ucon;

                            echo "Login Successful";
                            exit;
                        }
                    }else{
                        echo "Password Not Matching";
                        exit;
                    }
                }else{
                    echo "Sorry! You are not active yet.";
                }

            }else{
                echo "User not Available";
                exit;
            }
        }

    }else{
        echo "Email and Password Must be entered";
        exit;
    }
}


if (isset($_POST['usr_update_prof']) || !empty($_POST['usr_update_prof'])){
//    error_reporting(0);

    $name = mysqli_real_escape_string($db,$_POST['name']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $adds = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $dob = date('Y-m-d', strtotime($_POST['dob']));

    $picture = $_FILES['picture']['name'];
    $designation = mysqli_real_escape_string($db,$_POST['designation']);
    $bio = mysqli_real_escape_string($db,$_POST['bio']);
    $user_id = mysqli_real_escape_string($db,$_POST['usr_update_prof']);


    $dt = date("Y-m-d");

    if (empty($name)){
        echo "Email cannot be Empty";
        exit;
    }elseif (empty($email)){
        echo "Email cannot be Empty";
        exit;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email is not valid";
        exit;
    }elseif (empty($phone)){
        echo "Phone number is required";
        exit;
    }elseif (strlen($phone) != 11){
        echo "Phone number must be 11 digit";
        exit;
    }elseif (empty($adds)){
        echo "Address is required";
        exit;
    }elseif (empty($country)){
        echo "Please Choose Country";
        exit;
    }else{
        $pathUp = "assets/signup_images/";
        $perem = md5(date("YmdHis"));
        $mainimg = $perem.$picture;

        if (!empty($picture) && !empty($designation) && !empty($bio)){

            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp.$mainimg)){
                $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `designation` = '$designation', `bio` = '$bio', `picture` = '$mainimg' WHERE `id` = '$user_id'";
            }else{
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture) && !empty($designation)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `designation` = '$designation', `picture` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture) && !empty($bio)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `bio` = '$bio', `picture` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `picture` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($designation) && !empty($bio)){
            $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `designation` = '$designation', `bio` = '$bio' WHERE `id` = '$user_id'";
        }elseif (!empty($designation)){
            $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `designation` = '$designation' WHERE `id` = '$user_id'";
        }elseif (!empty($bio)){
            $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds', `bio` = '$bio' WHERE `id` = '$user_id'";
        }else{
            $query = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone', `dob` = '$dob', `country` = '$country', `address` =
                          '$adds' WHERE `id` = '$user_id'";
        }


        $result = mysqli_query($db, $query);

        if ($result){
            echo "Profile Update Successfully";
            exit;
        }else{
            die(header("HTTP/1.0 404 Not Found"));
        }

    }
}




if (isset($_POST['com_update_prof']) || !empty($_POST['com_update_prof'])){
//    error_reporting(0);

    $name = mysqli_real_escape_string($db,$_POST['name']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $adds = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $dob = date('Y-m-d', strtotime($_POST['dob']));

    $picture = $_FILES['picture']['name'];
    $designation = mysqli_real_escape_string($db,$_POST['main_task']);
    $user_id = mysqli_real_escape_string($db,$_POST['com_update_prof']);


    $dt = date("Y-m-d");

    if (empty($name)){
        echo "Email cannot be Empty";
        exit;
    }elseif (empty($email)){
        echo "Email cannot be Empty";
        exit;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email is not valid";
        exit;
    }elseif (empty($phone)){
        echo "Phone number is required";
        exit;
    }elseif (strlen($phone) != 11){
        echo "Phone number must be 11 digit";
        exit;
    }elseif (empty($adds)){
        echo "Address is required";
        exit;
    }elseif (empty($country)){
        echo "Please Choose Country";
        exit;
    }else{
        $pathUp = "assets/signup_images/";
        $perem = md5(date("YmdHis"));
        $mainimg = $perem.$picture;

        if (!empty($picture) && !empty($designation) && !empty($bio)){

            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp.$mainimg)){
                $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `main_task` = '$designation', `logo` = '$mainimg' WHERE `id` = '$user_id'";
            }else{
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture) && !empty($designation)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `main_task` = '$designation', `logo` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture) && !empty($bio)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `logo` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($picture)){
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $pathUp . $mainimg)) {
                $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `logo` = '$mainimg' WHERE `id` = '$user_id'";
            } else {
                echo "Image Not Uploaded";
            }
        }elseif (!empty($designation) && !empty($bio)){
            $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `main_task` = '$designation' WHERE `id` = '$user_id'";
        }elseif (!empty($designation)){
            $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds', `main_task` = '$designation' WHERE `id` = '$user_id'";
        }elseif (!empty($bio)){
            $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds' WHERE `id` = '$user_id'";
        }else{
            $query = "UPDATE company SET `name` = '$name', `email` = '$email', `phone` = '$phone', `started` = '$dob', `country` = '$country', `address` =
                          '$adds' WHERE `id` = '$user_id'";
        }


        $result = mysqli_query($db, $query);

        if ($result){
            echo "Profile Update Successfully";
            exit;
        }else{
            die(header("HTTP/1.0 404 Not Found"));
        }

    }
}




if (isset($_POST['usr_pass_update_prof']) || !empty($_POST['usr_pass_update_prof'])){
    $id = mysqli_real_escape_string($db, $_POST['usr_pass_update_prof']);
    $cp = mysqli_real_escape_string($db, md5($_POST['current_pass']));
    $np = mysqli_real_escape_string($db, md5($_POST['new_pass']));
    $crp = mysqli_real_escape_string($db, md5($_POST['con_pass']));

    if (empty($cp)){
        echo "Current Password is empty";
        exit;
    }elseif (empty($np)){
        echo "New Password is empty";
        exit;
    }elseif (empty($crp)){
        echo "Confirm Password is empty";
        exit;
    }elseif ($crp != $np){
        echo "New and Confirm Password not matching";
        exit;
    }else{
        $sql = "SELECT pass FROM users WHERE id = '$id'";
        $res = mysqli_query($db, $sql);
        $fet = mysqli_fetch_assoc($res);

        if ($fet['pass'] != $cp){
            echo "Passwords not matching";
        }else{
            $sqll = "UPDATE users SET pass = '$np' WHERE id = '$id'";
            $ress = mysqli_query($db, $sqll);

            if ($ress){
                echo "Password Updated Successfully";
                exit;
            }else{
                echo "Password not Updated";
                exit;
            }
        }
    }


}

if (isset($_POST['con_pass_update_prof']) || !empty($_POST['con_pass_update_prof'])){
    $id = mysqli_real_escape_string($db, $_POST['con_pass_update_prof']);
    $cp = mysqli_real_escape_string($db, md5($_POST['current_pass']));
    $np = mysqli_real_escape_string($db, md5($_POST['new_pass']));
    $crp = mysqli_real_escape_string($db, md5($_POST['con_pass']));

    if (empty($cp)){
        echo "Current Password is empty";
        exit;
    }elseif (empty($np)){
        echo "New Password is empty";
        exit;
    }elseif (empty($crp)){
        echo "Confirm Password is empty";
        exit;
    }elseif ($crp != $np){
        echo "New and Confirm Password not matching";
        exit;
    }else{
        $sql = "SELECT pass FROM company WHERE id = '$id'";
        $res = mysqli_query($db, $sql);
        $fet = mysqli_fetch_assoc($res);

        if ($fet['pass'] != $cp){
            echo "Passwords not matching";
        }else{
            $sqll = "UPDATE company SET pass = '$np' WHERE id = '$id'";
            $ress = mysqli_query($db, $sqll);

            if ($ress){
                echo "Password Updated Successfully";
                exit;
            }else{
                echo "Password not Updated";
                exit;
            }
        }
    }


}

if (isset($_POST['brdid']) || !empty($_POST['brdid'])){
    $id = mysqli_real_escape_string($db, $_POST['brdid']);

    $sql = "DELETE FROM board WHERE id = '$id'";
    $res = mysqli_query($db, $sql);

    if ($res){
        echo "Board Deleted Successfully";
        exit;
    }else{
        echo "Error to delete board";
        exit;
    }
}
if (isset($_POST['verifyid']) || !empty($_POST['verifyid'])){
    $id = mysqli_real_escape_string($db, $_POST['verifyid']);

    $sql = "DELETE FROM verification WHERE id = '$id'";
    $res = mysqli_query($db, $sql);

    if ($res){
        echo "Document Deleted Successfully";
        exit;
    }else{
        echo "Error to delete Document";
        exit;
    }
}


if (isset($_POST['usr_board_id']) || !empty($_POST['usr_board_id'])){
//    error_reporting(0);
    $uid = mysqli_real_escape_string($db, $_POST['usr_board_id']);
    $title = mysqli_real_escape_string($db, $_POST['board_name']);
    $brd_type = mysqli_real_escape_string($db, $_POST['board_type']);
    $brd_status = mysqli_real_escape_string($db, $_POST['board_status']);
    $brd_cont = mysqli_real_escape_string($db, $_POST['board_content']);
    $v_ids = $_POST['verific_id'];

    $vidrs = implode(', ', $v_ids);

    if (empty($title)){
        echo "Please Enter Board title";
        exit;
    }elseif (empty($brd_type)){
        echo "Please choose board type";
        exit;
    }elseif (empty($brd_status)){
        echo "Please choose board status";
        exit;
    }else{

        $sid = sha1(date('YmdHis'));
        $added = date('Y-m-d');

        if ($brd_status == 1){
            $ckid = mysqli_fetch_assoc($ckres)['id'];
            $upsql = "UPDATE board SET `default` = 2 WHERE user_id = '$uid'";
            $upres = mysqli_query($db, $upsql);
        }

        $sql = "INSERT INTO board(`user_id`, `board_name`, `board_content`, `sid`, `type`, `added`, `default`, `verification_id`)
                            VALUES('$uid', '$title', '$brd_cont', '$sid', '$brd_type', '$added', '$brd_status', '$vidrs')";

        $res = mysqli_query($db, $sql);

        if ($res){
            echo "Board Added Successfully".$vidrs;
            exit;
        }else{
            echo "Error to add board";
            exit;
        }

    }
}


if (isset($_POST['usr_board_up_id']) || !empty($_POST['usr_board_up_id'])){
    error_reporting(0);

    $uid = mysqli_real_escape_string($db, $_POST['usr_board_usr_id']);
    $bid = mysqli_real_escape_string($db, $_POST['usr_board_up_id']);
    $title = mysqli_real_escape_string($db, $_POST['board_name']);
    $brd_type = mysqli_real_escape_string($db, $_POST['board_type']);
    $brd_status = mysqli_real_escape_string($db, $_POST['board_status']);
    $brd_cont = mysqli_real_escape_string($db, $_POST['board_content']);

    $v_ids = $_POST['verific_id'];

    $vidrs = implode(', ', $v_ids);

    if (empty($title)){
        echo "Please Enter Board title";
        exit;
    }elseif (empty($brd_type)){
        echo "Please choose board type";
        exit;
    }elseif (empty($brd_status)){
        echo "Please choose board status";
        exit;
    }else{

        $sid = sha1(date('YmdHis'));
        $added = date('Y-m-d');

        if ($brd_status == 1){
            $ckid = mysqli_fetch_assoc($ckres)['id'];
            $upsql = "UPDATE board SET `default` = 2 WHERE user_id = '$uid'";
            $upres = mysqli_query($db, $upsql);
        }

        $sql = "UPDATE board SET board_name = '$title', board_content = '$brd_cont', `type` = '$brd_type', `default` = '$brd_status', `verification_id` = '$vidrs' WHERE id = '$bid' AND user_id = '$uid'";

        $res = mysqli_query($db, $sql);

        if ($res){
            echo "Board Updated Successfully";
            exit;
        }else{
            echo "Error to update board";
            exit;
        }

    }
}


if (isset($_POST['doc_u_id']) || !empty($_POST['doc_u_id'])){

    $doc_name = mysqli_real_escape_string($db, $_POST['doc_name']);
    $verifier = mysqli_real_escape_string($db, $_POST['verifier']);
    $doc_u_id = mysqli_real_escape_string($db, $_POST['doc_u_id']);

    $docs_img = $_FILES['docs_img']['name'];
    $docs_img_tmp = $_FILES['docs_img']['tmp_name'];
    $path = 'assets/verification_doc/';

    $perem = md5(date('Ymdhis')).str_replace(' ', '', $doc_name)."-";
    $dt = date("Y-m-d");


    if (empty($doc_name)){
        echo "Document Name is required";
    }elseif (empty($verifier)){
        echo "Verifier Must be choosen";
    }elseif (empty($docs_img)){
        echo "Document pictures are required";
    }else{
        $getCurrentUserPoint = mysqli_fetch_assoc(mysqli_query($db, "SELECT `mypoints` FROM `users` WHERE `id` = '".$doc_u_id."'"))['mypoints'];

        if ($getCurrentUserPoint <10){
            echo "Insufficient point for verification. [Minimum 10 needed]";
        }else{
            $countImg = count($docs_img);
            $img_name = [];

            for ($i = 0; $i < $countImg; $i++) {
                $gimage_pro2 = $perem.$docs_img[$i];

                move_uploaded_file($docs_img_tmp[$i], $path.$gimage_pro2);
                $img_name[] = $gimage_pro2;
            }

            $imp = implode(", ", $img_name);

            $sql = "INSERT INTO verification(`user_id`, `com_id`, `req_doc_info`, `req_doc`, `req_submitted`)
                            VALUES('$doc_u_id', '$verifier', '$doc_name', '$imp', '$dt')";
            $res = mysqli_query($db, $sql);
            $lastid = mysqli_insert_id($db);
            if ($res){
                $point = 10;
                $newUserpoint = $getCurrentUserPoint - $point;
                $upUser = mysqli_query($db, "UPDATE `users` SET mypoints = '$newUserpoint' WHERE `id` = '$doc_u_id'");

                $getCurrentCompanyPoint = mysqli_fetch_assoc(mysqli_query($db, "SELECT `mypoints` FROM `company` WHERE `id` = '".$verifier."'"))['mypoints'];
                $newCompanypoint = $getCurrentCompanyPoint + $point;
                $upCompany = mysqli_query($db, "UPDATE `company` SET mypoints = '$newCompanypoint' WHERE `id` = '$verifier'");

                $notif = mysqli_query($db, "INSERT INTO notification(`verific_id`, `user_id`, `verifier_id`, `user_type`) VALUES('$lastid', '$doc_u_id', '$verifier', 1)");

                echo "Successfully Added Document for Verification";
            }else{
                echo "Document not Added";
            }
        }
    }

}

if (isset($_POST['doc_v_id']) || !empty($_POST['doc_v_id'])){

    $doc_name = mysqli_real_escape_string($db, $_POST['doc_name']);
    $verifier = mysqli_real_escape_string($db, $_POST['verifier']);
    $doc_u_id = mysqli_real_escape_string($db, $_POST['doc_v_id']);

    $docs_img = $_FILES['docs_img']['name'];
    $docs_img_tmp = $_FILES['docs_img']['tmp_name'];
    $path = 'assets/verification_doc/';

    $perem = md5(date('Ymdhis')).str_replace(' ', '', $doc_name)."-";
    $dt = date("Y-m-d");


    if (empty($doc_name)){
        echo "Document Name is required";
    }elseif (empty($verifier)){
        echo "Verifier Must be choosen";
    }elseif (empty($docs_img)){
        echo "Document pictures are required";
    }else{
        $countImg = count($docs_img);
        $img_name = [];

        for ($i = 0; $i < $countImg; $i++) {
            $gimage_pro2 = $perem.$docs_img[$i];

            move_uploaded_file($docs_img_tmp[$i], $path.$gimage_pro2);
            $img_name[] = $gimage_pro2;
        }

        $imp = implode(", ", $img_name);

        $sql = "INSERT INTO verification_v(`user_id`, `com_id`, `req_doc_info`, `req_doc`, `req_submitted`)
                            VALUES('$doc_u_id', '$verifier', '$doc_name', '$imp', '$dt')";
        $res = mysqli_query($db, $sql);

        $lastid = mysqli_insert_id($db);
        $notif = mysqli_query($db, "INSERT INTO notification(`verific_id`, `user_id`, `verifier_id`, `user_type`) VALUES('$lastid', '$doc_u_id', '$verifier', 2)");

        if ($res){
            echo "Successfully Added Document for Verification";
        }else{
            echo "Document not Added";
        }
    }

}

if (!empty($_POST['getnot_user_id']) && !empty($_POST['getnot_user_type'])){

    if (!empty($_POST['getnot_user_type']) && $_POST['getnot_user_type'] == 'user'){
        $notSql = mysqli_query($db, 'SELECT * FROM `notification` WHERE `verifier_id` = "'.$_POST['getnot_user_id'].'" AND `user_type` = "2" AND `is_read` = "0"');
    }
    elseif (!empty($_POST['getnot_user_type']) && $_POST['getnot_user_type'] == 'verifier'){
        $notSql = mysqli_query($db, 'SELECT * FROM `notification` WHERE `verifier_id` = "'.$_POST['getnot_user_id'].'" AND `user_type` = "1" AND `is_read` = "0"');
    }

    $data = mysqli_num_rows($notSql);

    function get_verification_doc_name($db, $id){
        $sql = mysqli_query($db, "SELECT * FROM `verification` WHERE `id` = '$id'");
        $my = mysqli_fetch_assoc($sql);
        return $my['req_doc_info'];
    }

    ?>
    <button class="btn btn-neutral btn-icon dropdown-toggle mi_notify_btn" value="<?=$_POST['getnot_user_id'];?>" utype="<?=$_POST['getnot_user_type'];?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="btn-inner--icon">
                              <i class="fa fa-bell"></i>
                            </span>
        <span class="nav-link-inner--text notif_point">
                                    <?=$data;?>
                                </span>
    </button>
    <div class="dropdown-menu notifications-list-item">
        <?php
        while ($noi = mysqli_fetch_assoc($notSql)){
            ?>
            <a class="dropdown-item" href="vreq.php">Verification Request for: <?=get_verification_doc_name($db, $noi['verific_id']);?></a>
        <?php }?>
    </div>
<?php

}

if (isset($_POST['not_user_id']) && isset($_POST['not_user_type'])){

    if ($_POST['not_user_type'] == 'verifier'){
        $sql = "UPDATE `notification` SET `is_read` = 1 WHERE `verifier_id` = '".$_POST['not_user_id']."' AND `user_type` = 1";
    }else{
        $sql = "UPDATE `notification` SET `is_read` = 1 WHERE `verifier_id` = '".$_POST['not_user_id']."' AND `user_type` = 2";
    }
    $res = mysqli_query($db, $sql);
    if ($res){
        echo 'done';
    }else{
        echo 'notdone';
    }
}