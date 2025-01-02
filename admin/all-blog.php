<?php include "header.php"; 
$table = 'post';
$rows = '*';
$order = 'id';
$limit = '4';
$postObj = new Database();
$postObj->select($table, $rows, '', '',$order, $limit );
$result = $postObj->getResult();
?> 
<!-- Page-header end -->
<div class="col-sm-12">
        <div class="card tabs-card">
            <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">All Blog</h5>
            </div>
        </div>
         <!-- Tab panes -->
         <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>S.No</th>
                                <th>ID No</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $i=1;
                                foreach($result as list('id'=>$id, 'title'=>$title, 'post_date'=>$post_date, 'author'=>$author, 'blog_image'=>$image)){   
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $post_date; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><img src="uploads/<?php echo $image; ?>" alt="img" class="img-fluid img-100"></td>
                                <td><a href="add-blog.php?task=post_edit&post_id=<?php echo $id; ?>" class="#"><button class="btn btn-success btn-outline-success btn-mini">Edit</i></button></a>
                                    <a href="task.php?task=post_delete&post_id=<?php echo $id; ?>" class="#"><button class="btn btn-warning btn-outline-warning btn-mini">Delete</button></a>
                                </td>
                            </tr>        
                            <?php  $i++; } ?>          
                        </table>  
                    </div>
                    <!-- Pagination -->
                    <?php                  
                    $table = 'post';
                    $limit = '4';
                    $paginationObj = new Database();
                    // pagination(table, join, where, limit) only use this data value
                    echo $paginationObj->pagination($table, '', '', $limit );
                    ?>
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
    </div>
</div>
<?php include "footer.php"; ?> 
