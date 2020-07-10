<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
         session_start();         
      ?> 
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>VIDOE</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- JS -->
      <script src="load_chat.js"></script>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="o.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="jq.js"></script>
      <script type="text/javascript">
         var chat = new Chat();
         chat.getState();
         // $("#btn").click(alert("click"));
         $(document).on('click', '#btn', function() 
         { 
            // alert("click");
            var text = $("#text").val();
            chat.send(text);	
    			$("#text").val("");
         });
      </script>
<!-- <div id="bottom">Bottom</div> -->
   </head>
   <body id="page-top" onload="setInterval('chat.update()', 1000)">
      <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
         &nbsp;&nbsp; 
         <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
         <i class="fas fa-bars"></i>
         </button> &nbsp;&nbsp;
         <a class="navbar-brand mr-1" href="index.html"><img class="img-fluid" alt="" src="img/logo.png"></a>
         <!-- Navbar Search -->
         <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="button">
                  <i class="fas fa-search"></i> 
                  </button>
               </div>
            </div>
         </form>
         <!-- Navbar -->
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger">123+</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-envelope fa-fw"></i>
               <span class="badge badge-success">7</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li>
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
               <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img alt="Avatar" src="img/user.png">
               <?php
               if($_SESSION['Login'])
               {
                  echo $_SESSION['Login'];
               }
               ?> 
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="register.php" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
               </div>
            </li>
         </ul>
      </nav>
      <!-- <iframe frameborder = "0" style = "position:absolute;width:66%;height:75%;right:15%" name='chatWindow' id='chatWindow' src='frame.php'>Чат</iframe>  -->
      <div id="chat-area" style="position:absolute;left:20%">Чат тут...</div>
      <div id="wrapper">
         <!-- Sidebar -->
               
         <div class="container">
            <div class="row">
               <div class="col-4 container-fluid" id="navbar">
                  <ul class="sidebar navbar-nav border" id="container">
                     <?php
                     include('config.php');// connect to db
                     $flag_chat_name=0;//flag чтобы проверять состояние имени
                     @$Login=$_SESSION['Login'];
                     echo" <h4>Список чатов:</h4>";
                     $result_name = mysqli_query($db, "SELECT name FROM chat ORDER BY name"); //получить список чатов
                  
                     while($res = mysqli_fetch_array($result_name)) 
                     {
                        $name=$res['name'];  
                        $query = "SELECT id_chat FROM chat WHERE name='".$name."';";
                        $result = mysqli_query($db, $query);
                        $id_chat = mysqli_fetch_array($result);
                        echo "<li class=\"nav-item channel-sidebar-list\" id=\"f\"><ul>"; 
                        echo "<li><div onclick=\"load_chat($id_chat[0])\">";       
                        echo "<span><img class=\"img-fluid\" src=\"img/uzbekistan.png\">";
                        echo $name."</span>";
                        // echo '<form method="POST"><input type="hidden" style=\"float: right\" name="Chat_name_2" value="'.$name.'">
                        // <button style="font-size:12px"  type="submit" name="Join" >+</button> 
                        // </form>';
                        echo "</div></li>";

                        // // echo 'Участники: <br>';
                        // while($res = mysqli_fetch_array($result))
                        // { 
                        //     $id_chat=$res['id_chat'];
                        // } 
                        // $query = "SELECT login FROM members WHERE id_chat='$id_chat';";
                        // $result = mysqli_query($db, $query); 
                        // $count_members = 0;  
                        // while($res = mysqli_fetch_array($result)) 
                        // {   
                        //   $login=$res['login'];
                        //   $count_members++;
                        // }  

                        // if ($count_members % 10 == 1) 
                        // {
                        //     echo "<br><span>$count_members участник</span>";
                        // }
                        // elseif ($count_members % 10 == 2 || $count_members % 10 == 3 || $count_members % 10 == 4) 
                        // {
                        //     echo "<br><span>$count_members участника</span>";
                        // }
                        // else
                        // {
                        //     echo "<br><span>$count_members участников</span>";
                        // }
                        // /// А если так написать ->" <input type=\"hidden\" name=\"Chat_name_2\" value=".$name.">;
                        // ///ЭТА СУКА возьмет только первое слово в строке. Решил назвать "Первый чат"? Разбирайся почему же у тебя айди чата не находится, ууу бля горит
                        
                        // echo "<br>";
                        echo "</ul></li>";
                     }
                     ?>
                  </ul>
                 
               </div>
            </div>
         <!-- Chat will be shown here -->
            <div class="row-2 HCF" id="header">
               <div class="col">
                  <h4 id="head"></h4>
               </div>

               <div class="col">
                  <p id="under_head"></p>
               </div>
            </div>

            <!-- <form action='frame.php' method='post' id="send" target="chatWindow"> -->
            
             <div class="row">
             
                  <div class="col-8 t">
                  
                     <div class="input-group">
                     
                        <input type="text" class="form-control border" name = "message" id="text" placeholder="Написать сообщение..." value="">
                        <input type="hidden" name="id_chat" value="10">
                        <div class="input-group-append">
                           &nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="image" id="btn" src="img/send.png" alt="Отправить">
                        </div>
                     </div>
                  </div>
               </div>
               
            <!-- </form>  -->


<link rel="stylesheet" href="styles.css" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" />

            <!-- <form class="osahan-navbar-search"> -->
               
            <!-- </form> -->
         <!-- ----------------------- -->
            </div>
         </div>

         <!-- <div class="container">
            <div class="row">
               <div class="col">
                  <p id="chat"></p>
               </div>
            </div>
         </div> -->
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
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