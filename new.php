<!DOCTYPE html>
<html>
<body>
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
if(isset($_POST['create_1']))
{
    $t=$_POST['dur'];
    $tab4= "CREATE TABLE time
        (
            tim INT(100)
            
        )";
        $connection->query($tab4);
        $sql2="INSERT INTO time(tim)
                   VALUES ('$t')";
        $connection->query($sql2);
        echo "Time setted Successfully";
}
if(isset($_POST['add_Ins']))
{
    $in_no=$_POST['Ins_no'];
    $in=$_POST['Ins'];
    $tab3= "CREATE TABLE instructions
        (
            instruct_no INT(50),
            instruct VARCHAR(12000)
            
        )";
        $connection->query($tab3);
        $sql1="INSERT INTO  instructions(instruct_no,instruct)
                   VALUES ('$in_no','$in')";
        $connection->query($sql1);
        echo "Instruction added Successfully";
}
if(isset($_POST['ins1_delete']))
{
  if(isset($_POST['ins1no'])!=NULL)
  {
    $var_4=0;
    $del_4=$_POST['ins1no'];
    $sql5_1 = "SELECT instruct_no FROM instructions";
    $result1 = $connection->query($sql5_1);
    if ($result1->num_rows > 0) 
    {  
     while($data1= $result1->fetch_assoc()) 
     {
        if($data1['instruct_no']==$del_4)
        {
            $var_4=1;
        }
     }
  } 
  else 
  {
     $var_4=2;
     echo "No such instruction in the exam.";
  }
  if($var_4==1)
  {
    $sql5_2 = "DELETE FROM instructions WHERE instruct_no='$del_4'";
    if ($connection->query($sql5_2) === TRUE) 
    {
       $sql5_1 = "SELECT instruct_no FROM instructions";
        $result1 = $connection->query($sql5_1);
        if ($result1->num_rows > 0) 
        {  
          while($data1= $result1->fetch_assoc()) 
         {
          if($data1['instruct_no']>$del_4)
          {
            $x=$data1['instruct_no'];
            $y=$x-1;
            $sql_9="UPDATE instructions SET instruct_no='$y' WHERE instruct_no='$x'";
            $connection->query($sql_9);
          }
         }
        } 
       echo "Instruction deleted successfully";
    } 
    else
    {
       echo "Error deleting instruction: " . $connection->error;
    }
  }
  else if($var_4==0)
  {
    echo "There is no such instruction";
  }
  }
  else
  {
    echo "Please Enter the instruction number";
  }  
}
if(isset($_POST['add']))
{
    $q_no=$_POST['qno'];
    $question=$_POST['ques'];
    $crect=$_POST['crect'];
    $crect_no=$_POST['crectno'];
    $wrong1=$_POST['w1'];
    $wrong1_no=$_POST['w1no'];
    $wrong2=$_POST['w2'];
    $wrong2_no=$_POST['w2no'];
    $wrong3=$_POST['w3'];
    $wrong3_no=$_POST['w3no'];
    $sql1 = "SELECT test_name FROM tests";
    $res = $connection->query($sql1);
    
         $tab2= "CREATE TABLE questions
        (
            Question_no INT(50),
            Questions VARCHAR(12000),
            crectoption VARCHAR(50),
            crectoption_no INT(100),
            wrong1 VARCHAR(50),
            Wrong1_no INT(100),
            wrong2 VARCHAR(50),
            Wrong2_no INT(100),
            wrong3 VARCHAR(50),
            Wrong3_no INT(100)
        )";
        $connection->query($tab2);
        $sql="INSERT INTO  questions(Question_no,Questions,crectoption,crectoption_no,wrong1,Wrong1_no,wrong2,Wrong2_no,wrong3,Wrong3_no)
                   VALUES ('$q_no','$question','$crect','$crect_no','$wrong1','$wrong1_no','$wrong2','$wrong2_no','$wrong3','$wrong3_no')";
        $connection->query($sql);
        echo "Question added Successfully";
}
if(isset($_POST['delete']))
{
  if(isset($_POST['q1no'])!=NULL)
  {
    $var_1=0;
    $del_1=$_POST['q1no'];
    $sql5_1 = "SELECT Question_no FROM questions";
    $result1 = $connection->query($sql5_1);
    if ($result1->num_rows > 0) 
    {  
     while($data1= $result1->fetch_assoc()) 
     {
        if($data1['Question_no']==$del_1)
        {
            $var_1=1;
        }
     }
  } 
  else 
  {
     $var_1=2;
     echo "No such question in the exam.";
  }
  if($var_1==1)
  {
    $sql5_2 = "DELETE FROM questions WHERE Question_no='$del_1'";
    if ($connection->query($sql5_2) === TRUE) 
    {
        $sql5_1 = "SELECT Question_no FROM questions";
        $result1 = $connection->query($sql5_1);
        if ($result1->num_rows > 0) 
        {  
          while($data1= $result1->fetch_assoc()) 
         {
          if($data1['Question_no']>$del_1)
          {
            $x=$data1['Question_no'];
            $y=$x-1;
            $sql_9="UPDATE questions SET Question_no='$y' WHERE Question_no='$x'";
            $connection->query($sql_9);
          }
         }
        } 
       echo "Question deleted successfully";
    } 
    else
    {
       echo "Error deleting question: " . $connection->error;
    }
  }
  else if($var_1==0)
  {
    echo "There is no such question";
  }
  }
  else
  {
    echo "Please Enter the question number";
  }  
}

if(isset($_POST['modify']))
{
  if(isset($_POST['q2no'])!=NULL){
  $a= $_POST['q2no'];
  $b= $_POST['ques2'];
  $c= $_POST['crect2'];
  $d= $_POST['crectno2'];
  $e= $_POST['w1_2'];
  $f= $_POST['w1no2'];
  $g= $_POST['w2_2'];
  $h= $_POST['w2no2'];
  $i= $_POST['w3_2'];
  $j= $_POST['w3no2'];
  $sql_7 = "SELECT * FROM questions WHERE Question_no LIKE'%$a%'";
  $res=$connection->query($sql_7);

  if ($res->num_rows > 0) 
      {  
         while($data= $res->fetch_assoc()) 
         {
               $var=$data['Question_no'];
               $sql_9="UPDATE questions SET Question_no='$a',Questions='$b',crectoption='$c',crectoption_no='$d',wrong1='$e',Wrong1_no='$f',wrong2='$g',Wrong2_no='$h',wrong3='$i',Wrong3_no='$j' WHERE Question_no='$a'";
               if ($connection->query($sql_9) === TRUE) 
               {
                echo "Question modified successfully";
               } 
               else 
               {
                 echo "Error modifying question: " . $connection->error;
               }
          }
      }  
     else 
     {
        echo "Can't find such question";
     }
  }
}
 ?>
<div >
<form action="admin.php" type="post">
	<button type="submit" > <--BACK </button>
</form>
</div>
</body>
</html>
