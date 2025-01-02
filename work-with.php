<div class="cover-head">
    <h1>WORKED WITH</h1>
</div>
<div class="cover-body">
    <?php
        $workObj = new Database();
        $workObj->select('work','*','','','id','4');
        $getWorkResult = $workObj->getResult();
        foreach($getWorkResult as list('work_image'=>$workImage)){
    ?>
    <div class="company-1" >
        <a href="#"><img src="admin/uploads/<?php echo $workImage; ?>" alt=""> </a>
    </div>
    <?php } ?>
</div>