<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>VIDOE - Video Streaming Website HTML Template</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
      <?php 
        $p=0;
        include('config.php');
        if(isset($_POST['Registration']))
        {
            $Login=$_POST['login'];
            $Password=$_POST['password'];
            $Password_2=$_POST['password_2'];
            if($Password!=$Password_2){echo 'Пароли не совпадают';}
            $Password=password_hash($Password, PASSWORD_DEFAULT);
            if( $Login && $Password)
            {
               
                $query = "SELECT Login FROM user WHERE Login='".$Login."';";
                $checklogin = mysqli_query($db, $query);
                if(mysqli_num_rows($checklogin))
                {
                $p=1;
                }
                else
                {
                    $query= "INSERT INTO user VALUES('".$Login."', '".$Password."');";
                    mysqli_query($db, $query);
                    header("Location: login.php");
                    exit();
                }
            }
        }
        ?>
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Vidoe</h5>
                        <p>It is a long established fact that a reader <br> will be distracted by the readable.</p>
                     </div>
                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Login</label>
                           <input type="text" class="form-control" placeholder="Enter login" name="login" required>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                           <label>Confirm password</label>
                           <input type="password" class="form-control" placeholder="Password" name="password_2" required>
                        </div>
                        <?php

                          if($p == 1) { echo "<p style = \"color:red\" size = \"16\"> Данный логин используется "; }

                        ?><br>
                        <div class="mt-4">
                           <button type="submit" class="btn btn-outline-primary btn-block btn-lg" name="Registration">Sign Up</button>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Already have an Account? <a href="login.php">Sign In</a></p>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>