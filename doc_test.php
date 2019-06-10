<?php

require_once "private/db.php";

if (isset($_POST['doc_ui_id']) || !empty($_POST['doc_u_id'])){

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