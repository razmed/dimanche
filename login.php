<?php
session_start();
include('include/header.php');
include('includes/topbar.php');
include('include/sidebar.php');
include('config/dbcon.php');
if($_SESSION["auth"]){
    $_SESSION["status"] = "vous etes deja connecter";
       header("Location: index.php");
       exit();
}
?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
                <div>
                    <?php
                        if(isset($_SESSION['status']))
                        {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong>hey!</strong><?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <?php
                        unset($_SESSION['auth_status']);
                        }



                    ?>
                    <?php
                    include('message.php');
                    ?>
                </div>
                <div class="card-header bg-light">
                        <h5>Login form</h5>
                </div>
                <div class="card-body">
                    <form action="logincode.php" method="POST">
                        <div>
                            <label for="">email</label>
                            <input type="text" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="text" name="password" class="form-control" placeholder="password">
                        </div>
                        <hr>
                        <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn_primary btn-block" >Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
  include('includes/footer.php');
?>
<?php
  include('includes/script.php');
?>