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
      <?php include('config.php');
$p=0;
if(isset($_POST['submit']))
{
	$Login=$_POST['login'];
	$Password=$_POST['password'];

	$query = "SELECT password FROM user WHERE login='$Login';";
	$check = mysqli_query($db, $query);
	$check = mysqli_fetch_row($check);

	if($Login && $Password)
	{
    $Password=password_verify($Password, "$check[0]");
		if($Password)
		{
		//	session_id($Login);
			session_start();
      $_SESSION['Login']=$Login;
      $_SESSION['Admin']=0;
      if($Login=='admin')
      {
        $_SESSION['Admin']=1;
      }
      session_write_close();
    //	echo 1;
    
   // setcookie("login", $Login, time()+60*60*24*30, "/");
     // setcookie("hash", $check[0], time()+60*60*24*30, "/", null, null, true);

      header("Location: index.php"); exit();
		}
		else{$p=1;}
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
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-outline-primary btn-block btn-lg" name="submit">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="register.php">Sign Up</a></p>
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