<?php include "header.php";
$id = '';
$file = '';
$first_name = '';
$last_name = '';
$email = '';
$position = '';
if(isset($_GET['task']) == 'user_edit' && $_GET['user_id'] != ''){
   $obj = new Database();
   $id =$obj->get_safe_string($_GET['user_id']);
   $obj->select('users','*','',"id=$id",'','');
   $data = $obj->getResult();
    $first_name =$data['0']['first_name'];
    $last_name =$data['0']['last_name'];
    $email = $data['0']['email'];
    $position = $data['0']['position'];
    $file = $data['0']['profile_image'];
}
$statusObj = new Database;
if(isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = 0;
}
?> 
<div class="col-lg-12 col-md-12 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5>User Settings</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-times close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block">
             <form action="task.php" method="POST" enctype="multipart/form-data">
            <p class="text-success"><?php echo $statusObj->getStatus($status); ?></p>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" value="<?php echo $first_name; ?>" class="form-control from-control-primary" name="fname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" value="<?php echo $last_name; ?>" class="form-control from-control-primary" name="lname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" value="<?php echo $email; ?>" class="form-control from-control-primary" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control from-control-primary" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-5"> 
                        <select name="position" class="form-control" required>
                            <option value="0">Select Position</option>
                            <option value="1">Admin</option>
                            <option value="0">Editor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <?php if($file != null){ ?>
                    <div class="form-group row">
                        <img src="uploads/<?php echo $file; ?>" alt="img" class="img-fluid img-100">
                    </div>
                <?php } ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="action" value="addUser" >
                <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
            </form>
        </div>
        <div class="card-block">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $userObj = new Database();
                                $userObj->select('users', '*','', '', '', 5);
                                $result = $userObj->getResult();
                                foreach($result as list('id'=>$id, 'first_name'=>$first_name, 'last_name'=>$last_name,'email'=>$email,'position'=>$position, 'profile_image'=>$tableFileImage)){ ?>
                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $first_name; ?></td>
                                    <td><?php echo $last_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <?php
                                            if($position == 1){
                                                echo "<span class='label label-success'>Admin</span></td>";
                                            } else{
                                                echo "<span class='label label-danger'>User</span></td>";
                                            }                                   
                                        ?>
                                    </td>
                                    <td><img src="uploads/<?php echo $tableFileImage; ?>" alt="img" class="img-fluid img-100"></td>
                                    <td><a href="settings.php?task=user_edit&user_id=<?php echo $id; ?>" class="#"><button class="btn btn-success btn-outline-success btn-mini">Edit</i></button></a>
                                        <a href="task.php?user_delete=delete&user_id=<?php echo $id; ?>" class="#"><button class="btn btn-warning btn-outline-warning btn-mini">Delete</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <?php
                    $pagination = new Database();
                    echo $pagination->pagination('users','','',4);
                ?>
            </div>         
        </div>
    </div>
</div>
<?php include "footer.php"; ?> 
