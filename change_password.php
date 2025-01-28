<?php  

  include('inc/header.php');
  include('inc/navbar.php');  

  
  ?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-5" style="width:80%;margin:auto;">Change Password</h1>

    <div class="col-sm-6 mx-auto">
            
                <div class="border p-5 my-4">
                <?php  if(isset($_SESSION['error'])): ?>

                    <div class="alert alert-danger text-center"><?php  echo $_SESSION['error']; ?></div>
                    <?php  unset($_SESSION['error']); ?>

                <?php  endif; ?>
                    <form action="handler/change_password.php" method="POST">
                    <div class="form-group  my-3">
                            <input type="password" class="form-control" name="old_password" placeholder="Your Old Password">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" name="new_password" placeholder="Your New Password">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                        </div>
                        <div class="form-group my-3">
                            <input type="submit" name="submit" class="btn btn-block btn-primary"  value="submit">
                        </div>
                    </form>
                </div>
            </div>



    <?php  include('inc/footer.php'); ?>