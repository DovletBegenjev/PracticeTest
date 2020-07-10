<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
            @ $db = mysqli_connect('172.23.64.64', '18781439', '1');
        
            if (!$db) 
            {
                echo "Прости, брат! Мы не смогли соединиться с базой, брат!";
                exit;
            }
        
            mysqli_select_db($db, 'db_18781439');

            $query = "SELECT * FROM test where id = ?";
    
            $query2 = mysqli_prepare($db, $query);
            
            mysqli_stmt_bind_param($query2, 's', $_GET['q']);

            mysqli_stmt_execute($query2);
    
            mysqli_stmt_bind_result($query2, $id, $text);
    
            mysqli_stmt_fetch($query2);
    
            mysqli_stmt_close($query2);
    
            echo "<p style=\"margin: 7px\">" . $text . "</p>";
    
            mysqli_close($db);
        ?>
    </div>
</body>
</html>