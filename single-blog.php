<?php include 'header.php'; 
$blog_post = $_GET['blog_post'] ?? '';
if($blog_post == null){
    header("Location:index.php");
}
$workObj = new Database();
$row = ' post.id,post.title,post.post_date,post.details1,post.details2, post.author,post.blog_image ';
$where = " $blog_post = post.id ";
$workObj->select('post',$row,'',$where,'','');
$getWorkResult = $workObj->getResult();
$id = $getWorkResult['0']['id'];
$title = $getWorkResult['0']['title'];
$post_date = $getWorkResult['0']['post_date'];
$details1 = $getWorkResult['0']['details1'];
$details2 = $getWorkResult['0']['details2'];
$blog_image = $getWorkResult['0']['blog_image'];
?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="blog-container">
                        <div class="blank">
                        </div>
                        <div class="single-blog-image"  >
                            <img src="admin/uploads/<?php echo $blog_image; ?>" alt="">
                        </div>
                        <div class="single-blog-details">
                            <h1><?php echo $title; ?></h1>
                            <span>Author: <?php echo "Pablo Pikaso"; ?> / <?php echo $post_date; ?></span> 
                        </div>

                        <div class="single-blog-paragraph">
                           <p><?php echo $details1; ?><br> <br><?php echo $details2; ?></p> 
                        </div>        
                </div>        
            </div>
            <!--   Sidebar -->
            <?php include 'sidebar.php'; ?>
            <!-- comment Section -->
                <div class="comment-section">
                <form action="database/frontEndTask.php" method="POST", enctype="multimedia/form-data">
                <div class="form-row row centered">
                    <div class="col-md-6 mb-3 centered">
                    <label for="validationServer01">Name</label>
                    <input type="text" name="name" class="form-control is-valid" id="validationServer01" placeholder="First name" value="" required>
                    </div>

                    <div class="col-md-6 mb-3 centered">
                    <label for="validationServerUsername">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="text" name="email" class="form-control is-valid" id="validationServerUsername" placeholder="Email" aria-describedby="inputGroupPrepend3" required>
                    </div>
                    </div>
                    <div class="col-md-12 mb-3 centered ">
                    <label for="validationServer02">Massage</label>
                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="action" value="add-comment">
                <input class="btn btn-primary" type="submit" name="submit" value="Comment">
                    </form>
                </div>
       </div>
    </div>
</div>

<?php include 'footer.php'; ?>
