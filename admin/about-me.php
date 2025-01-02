<?php include "header.php"; 
$about_me = new Database();
$table = 'about';
$rows = '*';
$about_me->select($table, $rows,'', '', '', '');
$result = $about_me->getResult();
$id= $result[0]['id'];
$about1= $result[0]['first_field'];
$about2= $result[0]['second_field'];
$question= $result[0]['question'];
$email= $result[0]['email'];
$file= $result[0]['logo_image'];
?> 
<div class="col-lg-12 col-md-12 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5>About Me</h5>
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">About 1</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details First Half" name="about1"><?php echo $about1; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">About 2</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details Second Half" name="about2"><?php echo $about2; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details Third Half" name="question"><?php echo $question; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details Forth Half" name="email"><?php echo $email; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Logo Image</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="logo-image">
                    </div>
                </div>
                <?php if($file != null){ ?>
                    <div class="form-group row">
                        <img src="uploads/<?php echo $file; ?>" alt="img" class="img-fluid img-100">
                    </div>
                <?php } ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="action" value="update_about">
                <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?> 
