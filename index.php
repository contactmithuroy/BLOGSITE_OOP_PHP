<?php include 'header.php'; ?>

<div id="main-content">
    <div class="container-fluid nopadding ">
        <!-- cover page -->
        <div class="row"> 
            <div class="col-sm-12 nopadding"  >
                <div class="cover-page">
                    <div class="cover-head">
                    <?php
                        $indexTitle = new database();
                        $indexTitle->select('home_slide','*','','', '', '');
                        $getIndexTitle = $indexTitle->getResult();
                        $mainTitle = $getIndexTitle['0']['main_title'];
                        $subTitle = $getIndexTitle['0']['sub_title'];
                    ?>
                        <h2> <?php echo $mainTitle; ?></h2>
                    </div>
                    <div class="cover-body">
                        <p><?php echo $subTitle; ?></p>
                    </div>
                </div>
            </div>
        </div>   
        <!-- about me page -->
        <div class="row"> 
            <div class="col-sm-12 nopadding">
            <div class="recent-blog-page">
                    <?php  include "recent-blog.php"; ?>
                </div>
            </div>
        </div>    
        <!-- worked with  page-->
        <div class="row"> 
            <div class="col-sm-12 nopadding">
                <div class="work-with-page">
                    <?php  include "work-with.php"; ?>   
                </div>
            </div>
        </div>   

        <!-- recent blog  page-->
        <div class="row"> 
            <div class="col-sm-12 nopadding">
                
                <div class="about-me-page">
                    <?php  include "about-me.php"; ?>
                </div>
            </div>
        </div>

          <!-Contact with me-  -->
          <div class="row"> 
            <div class="col-sm-12 nopadding">
                
                <div class="contact-with-me">
                    <?php  include "contact-me.php"; ?>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include 'footer.php'; ?>
