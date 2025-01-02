<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location:index.php");
}else{
    header("Location:login.php");
}
include "../database/database.php";
$action = $_POST['action'] ?? '';
$status = false;
// add and update blog post 
if('add-blog' == $action){
    $obj = new Database();
    $status = false;
    $id = $obj->get_safe_string($_POST['id']);
    $title = $obj->get_safe_string($_POST['title']);
    $details1 = $obj->get_safe_string($_POST['details1']);
    $details2 = $obj->get_safe_string($_POST['details2']);
    $file = $_FILES['image'];
    $author = $obj->get_safe_string($_SESSION['user_id']);
    $date = date("d M, Y");
    $file_column = 'blog_image';
    $params = array('title'=>$title, 'post_date'=>$date, 'details1'=> $details1, 'details2'=> $details2, 'author'=>$author );
    if($_FILES['image'] == null && $id != ''){
        $where = " id = '$id' ";
        $status = $obj->update('post',$params, $where, '', '');       
    }elseif($_FILES['image'] != '' && $id != ''){
        $where = " id = '$id' ";
        $status = $obj->update('post',$params, $where, $file_column, $file);
    }
    else{
        $status = $obj->insert('post',$params, $file_column, $file);
    }
    if(!$status){
        header("Location:add-blog.php?status=8");
    }else {
        header("Location:add-blog.php?status=1");
    }
}
// blog post delete
$postDelete = $_GET['task'] ?? '';
if('post_delete' == $postDelete ){
    $result = '';
    $obj = new Database();
    $post_id = $obj->get_safe_string($_GET['post_id']);
    $where =" id = '$post_id' ";
    $result = $obj->delete('post',$where);
    if($result != null){
        header("Location:all-blog.php");
    }
    else{
        header("Location:all-blog.php");
    }
}
// comment delete function
$commentDelete = $_GET['comment'] ?? '';
if('cDelete' == $commentDelete){
    $status = '';
    $obj = new Database();
    $id = $obj->get_safe_string($_GET['cid']);
    $where =" id = '$id' ";
    $status = $obj->delete('comment',$where);
    if($status != null){
        header("Location:comment.php?status=2");
    }
    else{
        header("Location:comment.php?status=8");
    }
    print_r($status);
}
// massage delete function
$massageDelete = $_GET['massage'] ?? '';
if('mDelete' == $massageDelete){
    $status = '';
    $obj = new Database();
    $id = $obj->get_safe_string($_GET['mid']);
    $where =" id = '$id' ";
    $status = $obj->delete('massages',$where);
    if($status != null){
        header("Location:massage.php?status=2");
    }
    else{
        header("Location:massage.php?status=8");
    }
}
// add or update home slide text
if('home-slide' == $action){
    $obj = new Database();
    $status = false;
    $mainTitle = strtoupper($obj->get_safe_string($_POST['mainTitle']));
    $subTitle = strtoupper($obj->get_safe_string($_POST['subTitle']));
    $author = $obj->get_safe_string($_SESSION['user_id']);
    $params = array('main_title'=>$mainTitle, 'sub_title'=>$subTitle, 'author'=>$author);
    $status = $obj->update('home_slide', $params);
    if(!$status){
        header("Location:home-slide.php?status=8");
    }else {
        header("Location:home-slide.php?status=1");
    }
}
// about me function
if('update_about' == $action){
    $status ='';
    $obj = new Database();
    $id = $obj->get_safe_string($_POST['id']);
    $about1 = $obj->get_safe_string($_POST['about1']);
    $about2 = $obj->get_safe_string($_POST['about2']);
    $question = $obj->get_safe_string($_POST['question']);
    $email = $obj->get_safe_string($_POST['email']);
    $author = $obj->get_safe_string($_SESSION['user_id']);
    $file = $_FILES['logo-image'];
    $file_column = 'logo_image';
    $params = array('first_field'=>$about1, 'second_field'=>$about2, 'question'=> $question, 'email'=> $email, 'author'=>$author );
    if($_FILES['logo-image'] == null && $id != ''){
        $where = " id = '$id' ";
        $status = $obj->update('about',$params, $where, '', '');
       
    }elseif($_FILES['logo-image'] != '' && $id != ''){
        $where = " id = '$id' ";
        $status = $obj->update('about',$params, $where, $file_column, $file);
    }else{
        return false;
    }
    if(!$status){
        header("Location:about-me.php?status=8");
    }else {
        header("Location:about-me.php?status=1");
    }
}
if('update_headerfooter' == $action){
    $status ='';
    $obj = new Database();
    $id = $obj->get_safe_string($_POST['id']);
    $header_name = $obj->get_safe_string($_POST['header_name']);
    $copyright = $obj->get_safe_string($_POST['copyright']);
    $social_link = $obj->get_safe_string($_POST['social_link']);
    $author = $obj->get_safe_string($_SESSION['user_id']);
    $params = array('header_name'=>$header_name, 'copyright'=>$copyright, 'social_link'=> $social_link,'author'=>$author );
    $where = " id = '$id' ";
    $status = $obj->update('headerfooter',$params, $where, '', '');
    if(!$status){
        header("Location:headerFooter.php?status=8");
    }else {
        header("Location:headerFooter.php?status=1");
    }
}
// add recent work company photo
if('addWorkImage' == $action){
    $obj = new Database();
    $status = false;
    $file = $_FILES['image'] ?? '';
    $author = $obj->get_safe_string($_SESSION['user_id']);
    $file_column = 'work_image';
    $params = array('author'=>$author);
    if($_FILES['image'] != ''){
        $status = $obj->insert('work',$params, $file_column, $file);
    }
    if(!$status){
        header("Location:recent-work.php?status=8");
    }else {
        header("Location:recent-work.php?status=1");
    }
}
// recent work image delete
$recentWorkDelete = $_GET['work_image'] ?? '';
if('delete' ==$recentWorkDelete){
    $status = '';
    $obj = new Database();
    $id = $obj->get_safe_string($_GET['image_id']);
    $where =" id = '$id' ";
    $status = $obj->delete('work',$where);
    if($status != null){
        header("Location:recent-work.php?status=2");
    }
    else{
        header("Location:recent-work.php?status=8");
    }
}
// user Settings
if('addUser' == $action){
    $obj = new Database();
    $status = false;
    $id =  $obj->get_safe_string($_POST['id']);
    $fname = $obj->get_safe_string($_POST['fname']);
    $lname = $obj->get_safe_string($_POST['lname']);
    $email = $obj->get_safe_string($_POST['email']);
    $password = $obj->get_safe_string(md5($_POST['password']));
    $position = $obj->get_safe_string($_POST['position']) ?? '0';
    $file = $_FILES['image'];
    // for data update and insert only
    $table = 'users';
    $file_column = 'profile_image';
    $params=array('first_name'=>$fname, 'last_name'=>$lname, 'email'=>$email, 'password'=>$password, 'position'=>$position );
    $where = "id = '$id'";

    if($file ==  null && $id != null){
        $params=array('first_name'=>$fname, 'last_name'=>$lname, 'email'=>$email, 'password'=>$password, 'position'=>$position );
        $status = $obj->update($table, $params, $where, '' , '');
    }elseif($file != '' && $id != ''){
        $status =$obj->update($table, $params, $where, $file_column, $file);
    }else{
        $status =  $obj->insert($table, $params, $file_column, $file);
    }
    if(!$status){
        header("Location:settings.php?status=8");
    }else {
        header("Location:settings.php?status=1");
    }
}
$recentWorkDelete = $_GET['user_delete'] ?? '';
if('delete' ==$recentWorkDelete){
    $obj = new Database();
    $status = false;
    $id =$obj->get_safe_string($_GET['user_id']);
    $where = "id='$id'";
    $status = $obj->delete('users', $where);
    if(!$status){
        header("Location:settings.php?status=8");
    }else {
        header("Location:settings.php?status=1");
    }
    return true;

}
if('signin' == $action){
    $obj = new Database();
    $email = $obj->get_safe_string($_POST['email']);
    $password = $obj->get_safe_string(md5($_POST['password']));
    $result = '';
    $rows = " id, email, position ";
    $where = " email = '$email' AND password = '$password' ";
    $obj->select('users', $rows, '', $where, '', '' );
    $result = $obj->getResult();
    if($result != null){
        session_start();
        foreach($result as list('id'=>$user_id, 'email'=>$email,'position'=>$position)){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $email;
            $_SESSION['position'] = $position;

            header("Location:index.php");
        }
    }else{
        header("Location:login.php?status=6");
    }
}
// sign Out / Logout
$userLogout = $_GET['userLogout'] ?? '';
if('logout' == $userLogout) {
    $obj = new Database();
    $status = $obj->logout();
    if(!$status){
        header("Location:login.php");
    }
}















// if(isset($_POST['submit'])){
//     $title = ($_POST['title']);
//     $details1 = ($_POST['details1']);
//     $details2 =($_POST['details2']);
//     $file = $_FILES['image'];
//     $obj = new Database();

//     $author = 1;
//     $date = date("d M, Y");
//     $file_column = 'blog_image';
//     $params = array('title'=>$title, 'post_date'=>$date, 'details1'=> $details1, 'details2'=> $details2, 'author'=>$author );
//     $obj->insert('post',$params, $file_column, $file);
//     // header("Location:add-blog.php");
//     print_r($obj->getResult());


// }