<!DOCTYPE html>
<html>
<head>
    <style>
    body 
    {
    background-size: cover;
    background-color:LightGray;
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

     session_start();
     $score=0;
     $accroll=$_SESSION['roll'];
     $acc_email=$_SESSION['email'];
$acc_psw=$_SESSION['psw'];
$sql="SELECT q_no from users WHERE email='$acc_email' AND password='$acc_psw'";
$result=$connection->query($sql);
if ($result->num_rows > 0) 
{  
         while($data= $result->fetch_assoc()) 
         {
              $pre_q=$data['q_no'];
         }
}

     if(isset($_POST['result']))
     {     
              $bool=0;
              $sql="SELECT q_no from tab_$accroll";
              $result=$connection->query($sql);
              if ($result->num_rows > 0) 
              {  
                 while($data= $result->fetch_assoc()) 
                 {
                   if($pre_q==$data['q_no'])
                   {
                     $bool=1;
                     break;
                   }
                 }
              }
             if(isset($_POST['o']))
             {
                 $option=$_POST["o"];
                 if($bool==0)
                 {
                    $sql="INSERT INTO tab_$accroll(q_no,selected_option)
                   VALUES ('$pre_q','$option')";
                   $connection->query($sql);
                 }
                  else
                  {
                     $sql1="UPDATE tab_$accroll SET selected_option = $option WHERE q_no='$pre_q'";
                     $connection->query($sql1);
                  }
             }
     }
	 $sql="SELECT *from tab_$accroll";
              $result1=$connection->query($sql);
              if ($result1->num_rows > 0) 
              {  
                 while($data1= $result1->fetch_assoc()) 
                 {
                 	 $q_no=$data1['q_no'];
                 	 $sql1="SELECT *from questions WHERE Question_no='$q_no'";
                 	 $result2=$connection->query($sql1);
                 	  if ($result2->num_rows > 0) 
                      {
                        while($data2= $result2->fetch_assoc())
                        {
                        	if($data2['crectoption_no']==$data1['selected_option'])
                        	{
                        		$score++;
                        	}
                        }
                      }
                 }
              }
              echo "Your score is" .$score."<br/><br/>";
              $tab4= "CREATE TABLE SCORES
              (
                  roll INT(10),
                  score INT(10)
              )";
             $connection->query($tab4);
             $bool=0;
              $sql="SELECT roll from SCORES";
              $result=$connection->query($sql);
              if ($result->num_rows > 0) 
              {  
                 while($data= $result->fetch_assoc()) 
                 {
                   if($accroll==$data['roll'])
                   {
                     $bool=1;
                     break;
                   }
                 }
              }
                 if($bool==0)
                 {
                   $sql2="INSERT INTO SCORES(roll,score)
                   VALUES ('$accroll','$score')";
                      $connection->query($sql2);
                 }
                  else
                  {
                     $sql1="UPDATE SCORES SET score = $score WHERE roll='$accroll'";
                     $connection->query($sql1);
                  }
?>
<body>
	<form action="scores.php">
		<button type="submit">View scores</button>
	</form>
	</body>
</html>
