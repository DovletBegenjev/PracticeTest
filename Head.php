<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>
    Магазин Кофе "Коффейский"
  </title>
  <style>
    .div1 {
      margin-top: 5%;
      margin-bottom: 10%;
      margin-left: 20%;
      margin-right: 20%;
      background: rgba(194, 200, 202, 0.9);
    }
    .div2 {
      margin-top: 5%;
      margin-bottom: 5%;
      margin-left: 5%;
      margin-right: 5%;
      background: rgba(194, 200, 202, 0.001);
    }
    .div3{
 
            background: rgba(194, 200, 202, 0.9); 
        }
        @font-face{

        font-family: 'OLD';

        src: url('Old English Text MT Regular.ttf');

        src: 

        url('Old English Text MT Regular.ttf') format('truetype');



        font-weight: normal;

        font-style: normal;

        }
        p2{font-family: Pompadur;}
  </style>
</head>

<body  background="coffee.jpg">
<link href="css/bootstrap.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"  href="#"><p2>Коффейский</p2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Главная <span class="sr-only"></span></a>
      </li>
      
         <?php session_start(); 
        if(@$_SESSION['Login'])
    {
      echo '<li class="nav-item"> <a class="nav-link" href="cabinet.php">'.$_SESSION['Login'].'</a></li>
       <li class="nav-item"> <a class="nav-link"  href="logout.php"> Выход </a>
    
      </li>';}
      else{ echo '
      <li class="nav-item">
        <a class="nav-link" href="auth.php">Вход</a>
      </li>';
      }
      if(@$_SESSION['Admin']!=0){
        echo '<li class="nav-item">
        <a class="nav-link" <a href="admin.php">Управление сайтом </a></li>';
    }
    
    ?>
    </ul>
  </div>
</nav>
<div class="div1">
    <div class="div2">