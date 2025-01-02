<div id="sidebar" class="col-md-4">
    <div class="blank"> </div>
    <!-- search box -->
    <div class="search-box-container" id="id-marge">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <div class="recent-post-container " id="quite">
        <span>"If you look at what you have in life, you'll always have more. If you look at what you don't have in life, you'll never have enough." 
            </br>
            -Oprah Winfrey</span>
    </div>
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h1>Popular Post</h1>
        <ul>
        <?php
        $workObj = new Database();
        $workObj->select('post','*','','','id','5');
        $getWorkResult = $workObj->getResult();
        foreach($getWorkResult as list('id'=>$id,'title'=>$postTitle)){
        ?>
            <a href="single-blog.php?blog_post=<?php echo $id; ?>"><li><?php echo $postTitle; ?></li></a>
        <?php  } ?> 
        </ul>
    </div>
</div>