<!DOCTYPE html>
<html>
<head>
    <style>
    body 
    {
    background-size: cover;
    }
    div{
      border: 4px solid black;
      width: 80%;
     }

    button {
        background-color:blue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        
        cursor: pointer;
        width: 10%;
    }
    
    
    button:hover {
        opacity: 0.9;
    }
 
    
    .container {
        padding: 1px;
    }
</style>
    </head>
<body>
    <form class="container" action="index.php" style="text-align:right">
    <button onclick="" style="width:auto;">Log Out</button>
    </form>
    <h2>Instructions</h2>
    <div class="container">
    <form class="modal-content animate" >
<?php
    $Server = "localhost";
    $Username = "root";
    $Password = "";
    $dbasename = "project";
    $connection= new mysqli($Server, $Username, $Password,$dbasename);
    if ($connection->connect_error) 
    {
      die("Connection failed: " . $connection->connect_error);
    }
    $c=1;
    $sql1 = "SELECT instruct FROM instructions";
    $res = $connection->query($sql1);
    if ($res->num_rows > 0) 
    {  
         while($data= $res->fetch_assoc()) 
         {
           echo "$c .". $data["instruct"] . "<br><br>";
           $c++; 
         }
    } 
?>
</form>
</div>
<form action="quiz.php" method="POST">
   <button type="submit">Attempt quiz</button>
</form>
</body>
</html>