<div class="col-sm-12">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Home</a>
                    <div class="slide"></div>
                </li>
            </ul>
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
                                <th>Blog Image</th>
                            </tr>
                            <?php
                               $postObj = new Database();
                               $postObj->select('post','*', '', '','post_date', 10 );
                               $result = $postObj->getResult();
                               $i=1;
                               foreach($result as list('id'=>$id, 'title'=>$title, 'post_date'=>$post_date, 'author'=>$author, 'blog_image'=>$image)){   
                               ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $id ?></td>
                                <td><?php echo $title ?></td>
                                <td><?php echo $post_date ?></td>
                                <td><?php echo $author ?></td>
                                <td><img src="uploads/<?php echo $image; ?>" alt="img" class="img-fluid img-100"></td>
                            </tr>
                            <?php  $i++; } ?>  
                        </table>
                    </div>
                    <!-- Pagination -->
                    <?php                  
                    $paginationObj = new Database();
                    echo $paginationObj->pagination('post', '', 'post_date', 10 );
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>