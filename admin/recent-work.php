<?php 
include "header.php"; 
$statusObj = new Database;
if(isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = '0';
}
?> 
<div class="col-lg-12 col-md-12 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5>Recent Work</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-times close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block">
            <ul class="feed-blog">
                <li class="active-feed">
                    <div class="row">
                        <form action="task.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-dark">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                            </div>
                            <input type="hidden" name="action" value="addWorkImage" >
                            <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
                        </form>
                    </div>
                </li>
                <li class="active-feed">
                    <div class="feed-user-img">
                        <img src="assets/images/avatar-3.jpg" class="img-radius " alt="User-Profile-Image">
                    </div>                  
                    <div class="row">
                        <?php 
                            $postObj = new Database();
                            $postObj->select('work', '*', '', '','', '' );
                            $result = $postObj->getResult();
                            foreach($result as list('id'=>$id, 'work_image'=>$image, 'author'=>$author)){   
                        ?>
                        <div class="col-sm-3 text-center">
                            <img src="uploads/<?php echo $image; ?>" alt="img" class="img-fluid img-100">
                            <p class="text-muted m-b-0"><small>Work Image</small></p>
                            <p class="text-success"><?php echo $statusObj->getStatus($status); ?></p>                          
                            <a href="task.php?work_image=delete&image_id=<?php echo $id; ?>" class="#"><button class="btn btn-warning btn-outline-warning btn-sm ">Delete</button></a>
                        </div>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php include "footer.php"; ?> 
