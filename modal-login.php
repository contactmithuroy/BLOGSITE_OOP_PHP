
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Admin </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> 
        <!-- Modal body -->
        <div class="modal-body">
            <div id="wrapper-admin" class="body-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 mx-auto">
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
                                <input type="submit" name="login" id="login-btn" class="my-button " value="login" />
                            </form>
                            <!-- /Form  End -->
                        </div>                      
                    </div>
                </div>
            </div>
        </div>       
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
    </div>
</div>