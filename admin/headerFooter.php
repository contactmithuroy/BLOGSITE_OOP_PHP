<?php include "header.php"; 
$obj = new Database();
$obj->select('headerfooter', '*','', '', '', '');
$result = $obj->getResult();
$id= $result[0]['id'];
$header_name= $result[0]['header_name'];
$copyright= $result[0]['copyright'];
$social_link= $result[0]['social_link'];
?> 
<div class="col-lg-12 col-md-12 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5>Header & Footer</h5>
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
                    <label class="col-sm-2 col-form-label">Header</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Write your header" name="header_name"><?php echo $header_name; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Footer Copyright</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Copyright" name="copyright"><?php echo $copyright; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Footer Social Link</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="write your social manus" name="social_link"><?php echo $social_link; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="action" value="update_headerfooter">
                <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?> 
