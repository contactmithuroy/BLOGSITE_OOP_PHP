<?php
include 'header.php'; 
$searchObj = new Database();

if(isset($_GET['search'])){
    $value = $searchObj->get_safe_string($_GET['search']);
}else{
    header("Location:index.php");
}
$where = "post.title LIKE '%{$value}%' OR post.details1 LIKE '%{$value}%' OR post.details2 LIKE '%{$value}%' ";
$searchObj->select('post','*','',$where,'','');
$getSearchResult = $searchObj->getResult();
?>
<div id="main-content">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- post-container -->
            <div class="post-container">
                    <div class="blog-heading"  >
                        <h2> Posts you might like</h2>
                    </div>
                <?php foreach($getSearchResult as list('id'=>$id,'title'=>$postTitle,'post_date'=>$postDate,'details1'=>$details1,'details2'=>$details2,'blog_image'=>$blogImage)){ ?>
                    <div class="blog-main-page">
                        <div class="blog-image"  >
                                <!-- Snip1543 -->
                            <figure class="snip1543">
                                <img alt="single-blog.php?blog_post=<?php echo $id; ?>" src="admin/uploads/<?php echo $blogImage; ?>"/>
                                <figcaption>
                                    <h3><?php echo strtoupper(substr($postTitle,0,20))."..."; ?></h3>
                                    <!-- <p>The only skills I have the patience to learn are those that have no real application in life.</p> -->
                                </figcaption>
                                <a href="single-blog.php?blog_post=<?php echo $id; ?>"></a>
                            </figure>         
                        </div>
                        <div class="blog-pareagerp"  >
                            <div class="content-heading">
                            <a href="single-blog.php?blog_post=<?php echo $id; ?>"><h1><?php echo ucfirst(substr($postTitle,0,35)); ?></h1></a>
                            <span>Author:<?php echo "Pabllo Pikaso"; ?> /<?php echo $postDate; ?></span> 
                            </div>
                            <div class="content-pera">
                                <p> <?php echo  ucfirst(substr($details1,0,120)); ?>...</p>
                            </div>
                            <div class="content-more">
                                <a href="single-blog.php?blog_post=<?php echo $id; ?>"><img src="images/readmore.webp" alt="">View Full Coverage</a>
                            </div>                
                        </div>
                        <div class="underline"></div>
                    </div>
                <?php } ?>
               <!-- Pagination -->
               <?php                  
                    $paginationObj = new Database();
                    echo $paginationObj->pagination('post','', $where, 10 );
                ?>
            </div>        
        </div>
        <?php include 'sidebar.php'; ?>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>
