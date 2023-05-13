<?php
session_start();
include('config/dbcon.php');
if(isset($_POST['addUser']))
{
    $name=$_POST=['name'];
    $email=$_POST=['email'];
    $phone=$_POST=['phone'];
    $password=$_POST=['password'];
    $confirmpassword=$_POST=['confirmpassword'];
    if($confirmpassword=$password){
        $check_mail= "SELECT email FROM users WHERE email='$email'";
        $check_mail_run = mysqli_query($con , $check_mail);
        if(mysqli_num_rows( $check_mail_run) > 0){
            $_SESSION["status"] = "mail deja pris";
            header("Location: registered.php");
         }
         else{
            $user_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
            $user_query_run = mysqli_query($con , $user_query);
           if($user_query_run){
            $_SESSION["status"] = "inscription de l'utilisateur réuissite";
            header("Location: registered.php");
            } 
            else {
               $_SESSION["status"] = "Échec de l'inscription de l'utilisateur";
               header("Location: registered.php");
            }
        }

        }
    }
    else{
        $_SESSION["status"] = "Mot de passe ne match pas";
           header("Location: registered.php");
    }
if(isset($_POST['updateUser']))
{
    $user_id=$_POST=['user_id'];
    $name=$_POST=['name'];
    $email=$_POST=['email'];
    $phone=$_POST=['phone'];
    $password=$_POST=['password'];
    $query = "UPDATE users SET name='$name', email='$email', phone='$phone', password='$password' WHERE id='user_id";
    $query_run = mysqli_query($con , $user_query);
    if($user_query_run){
        $_SESSION["status"] = "mise à jour l'utilisateur réuissite";
        header("Location: registered.php");
        } 
        else {
           $_SESSION["status"] = "Échec de la mise à jour de l'utilisateur";
           header("Location: registered.php");
        }
}
if(isset($_POST['DeleteUserbtn']))
{
    $userid=$_POST['delete_id'];

    $query = "DELETE FROM users WHERE id=$userid";
    $query_run = mysqli_query($con , $query);
   if($query_run){
    $_SESSION["status"] = "suppression de l'utilisateur réuissite";
    header("Location: registered.php");
    } 
    else {
       $_SESSION["status"] = "Échec de la suppression de l'utilisateur";
       header("Location: registered.php");
    }
}
?>