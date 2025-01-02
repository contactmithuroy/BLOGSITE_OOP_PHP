<div class="my-blog-head">
    <h1>RECENT BLOG</h1>
</div>
<!-- blog box -->
<?php
    $workObj = new Database();
    $row = '*';
    $workObj->select('post',$row,'','','id','3');
    $getWorkResult = $workObj->getResult();
    foreach($getWorkResult as list('id'=>$id,'title'=>$postTitle,'post_date'=>$postDate,'details1'=>$details1,'details2'=>$details2,'blog_image'=>$blogImage)){
?>
    <!-- blog box -->
    <div class="my-blog">
            <!-- Snip1543 -->
        <figure class="snip1543">
            <img alt="single-blog.php?blog_post=<?php echo $id; ?>" src="admin/uploads/<?php echo $blogImage; ?>"/>
            <figcaption>
                <h3><?php echo strtoupper(substr($postTitle,0,20))."..."; ?></h3>
                <!-- <p>The only skills I have the patience to learn are those that have no real application in life.</p> -->
            </figcaption>
            <a href="single-blog.php?blog_post=<?php echo $id; ?>"></a>
        </figure>
        <div class="content-heading">
            <a href="single-blog.php?blog_post=<?php echo $id; ?>"><h1><?php echo ucfirst(substr($postTitle,0,35)); ?></h1></a>
            <span>Author: <?php echo"Pablo Pikaso"; ?> / <?php echo $postDate; ?></span> 
        </div>
        <div class="content-pera">
            <p> <?php echo ucfirst(substr($details1,0,120)); ?>...</p>
        </div>
        <div class="content-more">
            <a href="single-blog.php?blog_post=<?php echo $id; ?>"><img src="images/readmore.webp" alt="">View Full Coverage</a>
        </div>
    </div>
    <?php  } ?> 
<!-- blog box -->
<div class="my-blog-button">
    <a href="blog.php"><span>MORE FROM THE BLOG</span></a>
</div>