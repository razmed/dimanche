<?php
session_start();
include('include/header.php');
include('includes/topbar.php');
include('include/sidebar.php');
include('include/authentification.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">accueil</a></li>
              <li class="breadcrumb-item active">Utilisateurs enregistrés modifier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  
  <!-- Content Header (Page header) -->
  <section class="content">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h3 class="card-title">Utilisateurs enregistrés -modifier</h3>
                </div>
        <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="code.php" method="POST">
                                <?php
                                    if(isset($_GET['user_id']))
                                    {
                                    $user_id=$_GET['user_id'];
                                    $query= "*SELECT * FROM users WHERE id='$user_id' LIMIT 1";
                                    $query_run = mysqli_query($con , $query);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                                <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                                                <div class="form-group">
                                                     <label for="">Nom</label>
                                                     <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" placeholder="Nom">
                                                </div>  
                                                <div class="form-group">
                                                     <label for="">Email</label>
                                                     <input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                     <label for="">Numero de tel</label>
                                                     <input type="email" name="phone" value="<?php echo $row['phone'];?>" class="form-control" placeholder="Numero de tel">
                                                </div>
                                                <div class="form-group">
                                                     <label for="">Mot de passe</label>
                                                     <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control" placeholder="Mot de passe">
                                                </div>
                                            <?php
                                        }
                                    
                                    }
                                    else
                                    {

                                    }
                                    }

                                ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                         <label for="">Nom</label>
                                         <input type="text" name="name" class="form-control" placeholder="Nom">
                                    </div>  
                                    <div class="form-group">
                                         <label for="">Email</label>
                                         <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                         <label for="">Numero de tel</label>
                                         <input type="email" name="phone" class="form-control" placeholder="Numero de tel">
                                    </div>
                                    <div class="form-group">
                                         <label for="">Mot de passe</label>
                                         <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="sumbit" name="updateUser" class="btn btn-primary">mettre à jour</button>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

</div>
<?php
  include('includes/footer.php');
?>
<?php
  include('includes/script.php');
?>