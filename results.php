<!DOCTYPE html>
<html>
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
if(isset($_POST['result']))
{
	 $score=0;
	 $accroll=$_SESSION['roll'];
	 $sql="SELECT *from tab_$accroll";
              $result1=$connection->query($sql);
              if ($result1->num_rows > 0) 
              {  
                 while($data1= $result1->fetch_assoc()) 
                 {
                 	 $q_no=$data1['q_no'];
                 	 $sql1="SELECT *from questions WHERE Question_no='$q_no'";
                 	 $result2=$connection->query($sql1);
                 	  if ($result1->num_rows > 0) 
                      {
                        while($data2= $result2->fetch_assoc())
                        {
                        	if($data2['crectoption']==$data1['selected_option'])
                        	{
                        		$score++;
                        	}
                        }
                      }
                 }
              }
              echo '<div><h2>Your score is "$score"</h2></div>';
}
?>
</html>