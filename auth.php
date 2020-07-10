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




    <!-- <?php include('Head.php');?>
 
    
      <h2>
        <center>Вход на сайт</center>
      </h2>
      <hr>
      <br>

      <br>
      <p align="left">
        <form method="POST">
          
            <label>Логин</label>
            <p>
            <input type="text" name="login" required>
          </p>
          
          <label>Пароль</label>
          <p>
          <input type="password" name="password" required>
        </p>
        <?php if($p==1) echo"Неверный логин или пароль"?>
          <p>
          
            <button type="submit" name="submit">Войти</button>
          </p>
        </p>
        </form>
        <a href="reg.php">Зарегистрироваться</a>
        <br>
       
      </p><br><br>


      <?php// include('Down.php');?> -->