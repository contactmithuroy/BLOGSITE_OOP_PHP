<?php include "header.php"; 
$table = 'home_slide';
$rows ="*";
$home_slide = new Database();
$home_slide->select($table, $rows,'', '', '', '');
$result = $home_slide->getResult();
?> 
<?php foreach($result as list('main_title'=> $main_title, 'sub_title'=>$sub_title)){ ?>
<div class="col-sm-12">
        <div class="card tabs-card"> 
            <div class="card-block">
                <h5 class="m-b-10">Slide Title</h5>
                <h6>Main Title</h6>
                <p class="text-dark">
                    <?php echo $main_title; ?> 
                </p>
                <h6>Sub Title</h6>
                <p class="text-dark">
                    <?php echo $sub_title; ?>
                </p>
            </div>
        </div>
    <div class="card">
        <div class="card-header">
            <div class="card-block">
                <h4 class="sub-title">Update</h4>
                <form action="task.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Main Title</label>
                        <div class="col-sm-5">
                            <textarea rows="5" cols="5" class="form-control"
                             name="mainTitle"> <?php echo $main_title; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sub Title</label>
                        <div class="col-sm-5">
                            <textarea rows="5" cols="5" class="form-control"
                             name="subTitle"> <?php echo $sub_title; ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="home-slide">
                    <input type="submit" class="btn btn-inverse" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>                                
</div> 
<?php } ?>
<?php include "footer.php"; ?> 
