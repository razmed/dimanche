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

<!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
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
                <div class=row>
                    <div class="col-md-6">
                       <div class="form-group">
                       <label for="">Mot de passe</label>
                       <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                       </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">confirmer Mot de passe</label>
                    <span class="email_error text-danger ml-2"></span>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="confirmer le Mot de passe">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="sumbit" name="addUser" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--delete modal-->
<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
            <div class="modal-body">
               <input type="hidden" name="delete_id" class="delete_user_id">
               <p>
               êtes vous sûr de vouloir supprimer
              </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="sumbit" name="DeleteUserbtn" class="btn btn-primary">oui Supprimer</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
 <!-- /.content-header -->
 <section class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
if(isset($_SESSION['status']))
{
echo "<h4>" .$_SESSION['status']."</h4>";

unset($_SESSION['status']);



}





?>
       
       <div class="card">
    <div class="card-header">
      <h3 class="card-title">Utilisateurs enregistrés</h3>
      <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm float-right"> Ajouter utilisateur </a>
  </div>
 <!-- /.card-header -->
 <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                             <tr>
                               <th>Nom</th>
                               <th>Email</th>
                               <th>Numero de tel</th>
                               <th>Status</th>
                               <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                  $query = "SELECT * FROM users ";
                                  $query_run = mysqli_query($con,$query);
                                  if(mysqli_num_rows($query_run)>0)
                                  {
                                  foreach($query_run as $row)
                                  {
                                ?>
                              <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td>
                                  <a href="registered-edit.php?user_id=<?php echo $row['id'];?>" class="btn btn-info btn-sm" >Modifier</a>
                                  <button type="button" value="<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                              </tr>
                                <?php
                                 }
                                 }
                                  else
                                 {
            ?>
            <tr>
              <td colspan="5"> Aucun dossier trouvé</td>
            </tr> 
                                 <?php
                                 }
                                 ?>

                        </tbody>
                      </table>
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
<script>
 $(document).ready(function(e)){
  $('.email').keyup(function(e)){
    var email =$$('.email').val();
    $.ajax({
      type:"POST",
      url:"code.php",
      data:{
        'check_emailbtn':1,
        'email':email,
      },
      success:function(response){
       //console.log(response);
       $('.email_error')text(response);
      }
    });
  }
 }
 
 
</script>
<script>
  $(document).ready(function(){
    $('.deletebtn').click(function(e){
      e.preventDefault();
      var user_id = $(this).val();
      //console.log(deletebtn);
      $('.delete_user_id').val(user_id);
      $('#delete_user_modal').modal('show');
    })
  })
  </script>