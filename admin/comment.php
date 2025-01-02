<?php include "header.php"; 
$allComment =new Database();
$allComment->select('comment','*','' , null, null, '10' );
$result = $allComment->getResult();
?> 
<!-- Massage Box -->
<div class="col-lg-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="card-header-text">ALL Comment</h3>
        </div>
        <div class="card-block accordion-block">
            <div class="accordion-box" id="sclae-accordion">
                <?php foreach($result as list('id'=>$id,'post_id'=>$post_id,'sender_name'=>$name, 'sender_email'=>$email, 'date'=>$date, 'comment'=>$massage)){ ?>
                <p><strong><?php echo $name ?></strong></p>
                <h6 class="sub-title text-muted"><small class="text-muted"><?php echo $email ?> </small> <br> <small class="text-muted"><?php echo $date ?> </small></h6>
                <div class="accordion-desc">
                    <p class="m-b-45" ><span class='label badge-danger'><?php echo $post_id ?> </span><?php echo $massage ?> </p>
                </div>
                <a href="task.php?comment=cDelete&cid=<?php echo $id ?>" class="#"><button class="btn btn-warning btn-outline-warning btn-mini">Delete</button></a>
                </br><hr>
                <?php } ?>
            </div>
            <!-- Pagination -->
            <?php
                $pagination = new Database();
                echo $pagination->pagination('comment', '', '', '10');
            ?>
        </div>
    </div>
</div>
<!-- Comment Box -->
<?php include "footer.php"; ?> 
