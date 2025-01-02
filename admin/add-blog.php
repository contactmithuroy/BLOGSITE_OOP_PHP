<?php include "header.php";
$id = '';
$title ='';
$details1 = '';
$details2 = '';
$file = '';
if(isset($_GET['task']) == 'post_edit' && $_GET['post_id'] != ''){
    $obj = new Database();
    $id =$obj->get_safe_string($_GET['post_id']);
    $where = " id = '$id'";
    $obj->select('post','*', '', $where,'', '' );
    $result = $obj->getResult();
    $title =$result['0']['title'];
    $details1 =$result['0']['details1'];
    $details2 = $result['0']['details2'];
    $file = $result['0']['blog_image'];
}
?> 
<div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
            <h4 class="sub-title">Inputs Blog Data</h4>
        </div>
        <div class="card-block">
            <form action="task.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-5">
                        <input type="text" value="<?php echo $title; ?>" class="form-control from-control-primary" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Details 1</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details First Half" name="details1"> <?php echo $details1; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Details 2</label>
                    <div class="col-sm-5">
                        <textarea rows="5" cols="5" class="form-control"
                        placeholder="Details Second Half" name="details2"> <?php echo $details2; ?> </textarea>
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
                <input type="hidden" name="action" value="add-blog">
                <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
            </form>
        </div>
    </div>                                
</div> 
<?php include "footer.php"; ?> 
