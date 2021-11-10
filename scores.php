<!DOCTYPE html>
<html>
<head>
<style>
    body 
    {
    background-size: cover;
    background-color:lightblue;
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
<div class="container" style="text-align:right">
    <form class="modal-content animate" action="index.php" method="POST">
                     
                <button type="submit" name="go">Log Out</button>
         
    </form>
</div>
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
$scores=array();
$roll=array();
$sql="SELECT *from SCORES";
$result3=$connection->query($sql);
if ($result3->num_rows > 0) 
{
   while($data3= $result3->fetch_assoc())
   {
      array_push($scores,$data3['score']);            	
   }
}
else
{
         echo "<script>window.location.href='main.php';
                  alert('No records available....');
                  </script>";
}
rsort($scores);
$length = count($scores);
$sql="SELECT *from SCORES";
if ($result3->num_rows > 0) 
{
   for($x = 0; $x < $length; $x++) 
   {
    $y = $scores[$x];
    $result3=$connection->query($sql);
   while($data3= $result3->fetch_assoc())
   {
      if($y==$data3['score'])
      {
         array_push($roll,$data3['roll']);
      }
                    
   }
  }
}
echo "<u><h1>Scores:</h1></u><br></br>";
echo "<h3>Roll no --- Score</h3><br>";
for($x = 0; $x < $length; $x++) 
{
echo "   ".$roll[$x]."  -------  ".$scores[$x]."<br>";
echo "<br>";
}
?>
<div class="container" >
    <form class="modal-content animate" action="main.php" method="POST">
                     
                <button type="submit" name="go1">Go to main page</button>
         
    </form>
</div>

</html>
