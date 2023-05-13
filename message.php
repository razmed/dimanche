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