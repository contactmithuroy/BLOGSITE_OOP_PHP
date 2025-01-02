<?php
include "database.php";
$action = $_POST['action'] ?? '';

if('add-massage' == $action){
    $status = false;
    $obj = new Database();
    $name =$obj->get_safe_string($_POST['name']) ?? '';
    $email = $obj->get_safe_string($_POST['email']) ?? '';
    $massage = $obj->get_safe_string($_POST['massage']) ?? '';
    $date = date("d M, Y");
    if($name != null && $email !=null && $massage !=null){
        $params =array('sender_name'=>$name,'sender_email'=>$email,'date'=>$date,'massage'=>$massage);
        $status = $obj->insert('massages', $params,'','','');
    }
    if(!$status){
        header("Location:../index.php?status=8");
    }else {
        header("Location:../index.php?status=1");
    }
}
// add massage section
if('add-comment' == $action){
    $status = false;
    $obj = new Database();
    $id =$obj->get_safe_string($_POST['id']) ?? '';
    $name =$obj->get_safe_string($_POST['name']) ?? '';
    $email = $obj->get_safe_string($_POST['email']) ?? '';
    $comment = $obj->get_safe_string($_POST['comment']) ?? '';
    $date = date("d M, Y");
    if($name != null && $email !=null && $comment !=null){
        $params =array('post_id'=>$id,'sender_name'=>$name,'sender_email'=>$email,'date'=>$date,'comment'=>$comment);
        $status = $obj->insert('comment', $params,'','','');
    }
    if(!$status){
        header("Location:../single-blog?blog_post=$id&status=8");
    }else {
        header("Location:../single-blog.php?blog_post=$id&status=1");
    }

}