<?php
$title =new Database();
$title->select('headerfooter','*','', null, null,null );
$result = $title->getResult();
$header = $result['0']['header_name'];
?> 
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php">      
                <!-- <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" /> -->
                <h5><?php echo $header ?></h5>
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- side bar toggle -->
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>               
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-pink"></span>
                    </a>
                    <!-- Notification Bar -->
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>
                        <?php
                            $notification =new Database();
                            $id =  $_SESSION['user_id'];
                            $notification->select('massages','*','' , null, 'date', '4' );
                            $result = $notification->getResult();
                            foreach($result as list('sender_name'=>$notifName, 'massage'=>$notifMassage, 'date'=>$notifDate)){
                        ?>
                        <li>
                            <div class="media">
                                <img class="d-flex align-self-center img-radius" src="assets/images/avatar.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user"><?php echo $notifName ?></h5>
                                    <p class="notification-msg"><?php echo substr($notifMassage, 0, 30)."..." ?></p>
                                    <span class="notification-time"><?php echo $notifDate ?></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>                 
                    </ul>
                </li>
                <!-- Right side logout manus -->
                <?php
                    $user =new Database();
                    $id =  $_SESSION['user_id'];
                    $where = " id = '$id' ";
                    $user->select('users', ' first_name, last_name, profile_image ' ,'', $where, null,null );
                    $result = $user->getResult();
                    $fname = $result['0']['first_name'];
                    $lname = $result['0']['last_name'];
                    $profile_image = $result['0']['profile_image'];
                ?>
                <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="uploads/<?php echo $profile_image; ?>"" class="img-radius" alt="User-Profile-Image">
                        <span><?php echo $fname. " ". $lname; ?></span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="settings.php">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="task.php?userLogout=logout">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
           </nav>