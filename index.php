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
              <li class="breadcrumb-item active">Utilisateurs enregistrés </li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Utilisateurs enregistrés </h3>
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm float-right"> Retour </a>
                    </div>
        <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
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