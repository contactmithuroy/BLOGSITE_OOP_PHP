<?php include "header.php"; ?>

<div id="wrapper-admin" class="body-content">
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="heading"><i class='fa fa-user'></i> Admin</h3>
            <!-- Form Start -->
            <form  action="<?Php $_SERVER['PHP_SELF'] ?>" method ="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <input type="submit" name="login" id="login-btn" class="btn btn-primary " value="login" />
            </form>
            <!-- /Form  End -->
        </div>
        
    </div>
</div>
</div>





<?php include "footer.php"; ?>