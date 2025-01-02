<div class="about-me-head">
    <h1>ABOUT ME</h1>
</div>
<div class="about-logo">
<?php 
    $aboutObj = new Database();
    $aboutObj->select('about','*','','','id desc','');
    $getAboutResult = $aboutObj->getResult();
    foreach($getAboutResult as list('first_field'=>$first_field, 'second_field'=>$second_field, 'question'=>$question, 'email'=>$about_email, 'logo_image'=>$logoImage)){
?>
    <img src="admin/uploads/<?php echo $logoImage; ?>" alt="">  
</div>
<div class="about-me-details">
        <p> <?php echo $first_field; ?> 
        </br></br>
        <?php echo $second_field; ?>
        </br></br>
        <?php echo $question; ?>
        </br>
        <?php echo $about_email; ?>
    </p>
<?php  } ?>  
</div>