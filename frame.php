
<body>
<?php
$function = $_POST['function'];
$log = array();
include('config.php');
session_start(); 
$Login = "";
switch($function) 
{
  case 'getState':
    $query = "SELECT * from messages where 1";
    $res = mysqli_query($db, $query);
    $log['state'] = mysqli_num_rows($res);
    break;

  case 'update':
    $state = $_POST['state'];
    $query2 = "SELECT * from messages where 1";
    $res2 = mysqli_query($db, $query);
    $cnt = mysqli_num_rows($res2);
    if($state == $cnt)
    {
      $log['state'] = $state;
      $log['text'] = false;  
    }
    else
    {
      $text = array();
      $log['state'] = $state + $cnt - $state;
      foreach ($res2 as $line_num => $line)
      {
        if($line_num >= $state)
        {
          $text[] =  $line = str_replace("\n", "", $line);
        }
      }
      $log['text'] = $text; 
    }
    break;

    case 'send':
      $mess = $_POST['message'];
      if($mess)
      {
        $Login=$_SESSION['Login'];
        $id_chat=10;
        $query = "INSERT INTO messages(id_chat,login,text,date_create) VALUES ('".$id_chat."','".$Login."','".$mess."',NOW())";
        mysqli_query($db, $query);
      }
      break;
      
  
}
  echo json_encode($log);
?>

</body>

<!-- // ----------------------
  $check = "select max(`login`) from messages";
  $login2 = mysqli_query($db, $check);
  $l = mysqli_fetch_array($login2);
  // ----------------------

  $query = "SELECT * from messages where 1 order by id_mess desc";
  $res = mysqli_query($db, $query);
  while($row = mysqli_fetch_array($res))
  {
    echo "<br> <hr color = 'purple'>";
    echo "<p style = 'size:16px;color:purple;float:left;'>";
    echo $row['login'];
    echo "</p>   ";
    echo "<p style = 'size:12px;color:gray;'>";
    $date = $row['date_create'];
    echo substr ( $date , 5 , 11 ) ;
    echo "</p>";
    echo $row['text'];
    // echo "<br> <hr color = 'purple'>";
  } -->