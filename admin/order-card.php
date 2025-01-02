<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Blog</h6>
                <?php
                    $totalBlog = new Database();
                    $data = $totalBlog->getRowsNumber('post','', '','' );
                    $row = $totalBlog->getResult();
                ?>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span><?php echo ($row); ?></span></h2>
                <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total User</h6>
                <?php
                    $totalUser = new Database();
                    $userData = $totalUser->getRowsNumber('users','', '','' );
                    $userRow = $totalUser->getResult();
                ?>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span><?php echo ($userRow); ?></span></h2>
                <!-- <p class="m-b-0">This Month<span class="f-right">213</span></p> -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Massage</h6>
                <?php
                    $totalMassage = new Database();
                    $massageData = $totalMassage->getRowsNumber('massages','', '','' );
                    $massageRow = $totalMassage->getResult();
                ?>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span><?php echo ($massageRow); ?></span></h2>
                <!-- <p class="m-b-0">This Month<span class="f-right">$5,032</span></p> -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-pink order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Comment</h6>
                <?php
                    $totalComment = new Database();
                    $commentData = $totalComment->getRowsNumber('comment','', '','' );
                    $commentRow = $totalComment->getResult();
                ?>
                <h2 class="text-right"><i class="ti-wallet f-left"></i><span><?php echo ($commentRow); ?></span></h2>
                <!-- <p class="m-b-0">This Month<span class="f-right">$542</span></p> -->
            </div>
    </div>
</div>