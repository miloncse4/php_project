<?php
    session_start();
    require_once'../db.php';
    $sub_title = $_POST['sub_title'];
    $title_top = $_POST['title_top'];
    $title_bottom = $_POST['title_bottom'];
    $detail = $_POST['detail'];

    $uploaded_images_size = $_FILES['banner_image']['size'];

    if($uploaded_images_size <= 2000000){
        $uploaded_images_name = $_FILES['banner_image']['name'];
        $after_explode = explode('.',$uploaded_images_name);
        $uploaded_image_ext = end($after_explode);
        $allow_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');
        if(in_array($uploaded_image_ext,$allow_ext)){
            $insert_banner_query ="INSERT INTO banners (sub_title,title_top,title_bottom,detail) VALUES
             ('$sub_title','$title_top','$title_bottom','$detail')" ;
             $from_query = mysqli_query($db_conect,$insert_banner_query);
             $id_form_db = mysqli_insert_id($db_conect);
            
           $new_name = "$id_form_db".".".$uploaded_image_ext;
           $upload_location = "../uploads/banner/".$new_name;
           move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_location);

           $db_location = "uploads/banner/".$new_name;

           $update_location_query = "UPDATE banners SET image_location='$db_location' WHERE id=$id_form_db";
           mysqli_query($db_conect, $update_location_query );
           header('location: banner.php');
        }
        else{
            echo"file is not allow";
        }
    }
    else{
        echo"upload kora jaba na";
    }
?>