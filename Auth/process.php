<?php

require "../Controller/MainController.php";
$user = new MainController();


if(isset($_POST) and isset($_POST['login']))
{
    echo "log";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $u=$user->login($email,$password);

  
    
}
if(isset($_POST) and isset($_POST['signup']))
{
    echo "sign";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom = $_POST['name'];
  
    $p=$user->register($nom,$email,$password);

   
}

?>
