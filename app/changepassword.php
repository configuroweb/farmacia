
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
 
<link rel="stylesheet" href="assets/css/popup_style.css"> 
 <?php
//session_start();
 include('./constant/connect.php');

?>




</script>
  
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change Password</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>

            </div>

            
            
            
            <div class="container-fluid">
                
                
                
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
                    <fieldset>
                        <legend>Change Username</legend>

                        <div class="changeUsenrameMessages"></div>          

                        <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
                          <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
                        </div>
                      </div>
                    </fieldset>

                </form>

                <form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
                    <fieldset>
                        <legend>Change Password</legend>

                        <div class="changePasswordMessages"></div>

                        <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="npassword" class="col-sm-2 control-label">New password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
                          <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
                          
                        </div>
                      </div>


                    </fieldset>

                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                

                
           

 
<?php include('./constant/layout/footer.php');?>



<?php }?>