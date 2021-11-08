<!DOCTYPE html>
<html>
<head>
    <style>
    button{
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border:20px black;
        cursor: pointer;
        width:40%;
    }
</style>
    </head>
<?php
session_start();
$Server = "localhost";
$Username = "root";
$Password = "";
$dbasename = "project";
$connection= new mysqli($Server, $Username, $Password,$dbasename);
if ($connection->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}
$acc_email=$_SESSION['email'];
$acc_psw=$_SESSION['psw'];
$accroll=$_SESSION['roll'];
$sql="SELECT q_no from users WHERE email='$acc_email' AND password='$acc_psw'";
$result=$connection->query($sql);
if ($result->num_rows > 0) 
{  
         while($data= $result->fetch_assoc()) 
         {
              $pre_q=$data['q_no'];
         }
}
$sql="SELECT Question_no from questions";
$result=$connection->query($sql);
if ($result->num_rows > 0) 
{  
         while($data= $result->fetch_assoc()) 
         {
              $pre_qid=$data['Question_no'];
         }
}

if($pre_qid>=$pre_q)
{
   if(isset($_POST['next']))
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
}

if(isset($_POST['prev']))
{
    if($pre_q>1)
    {
         $pre_q=$pre_q-1;
         $sql="UPDATE users SET q_no=$pre_q WHERE email='$acc_email' AND password='$acc_psw'";
         $connection->query($sql);
    }
}
if(isset($_POST['next']))
{
    if($pre_q<=$pre_qid)
    {
         $pre_q=$pre_q+1;
         $sql="UPDATE users SET q_no=$pre_q WHERE email='$acc_email' AND password='$acc_psw'";
         $connection->query($sql);
    }
}



$sql1 = "SELECT*FROM questions WHERE Question_no=$pre_q";
    $res = $connection->query($sql1);
    if ($res->num_rows > 0) 
    {  
         while($data= $res->fetch_assoc()) 
         {
              echo '<b>Question &nbsp;'.$data['Question_no'].'&nbsp;:<br />'.$data['Questions'].'</b><br /><br />';
         }
    }
    echo '<form action="quiz.php" method="POST">';
    $sql2 = "SELECT*FROM questions WHERE Question_no=$pre_q";
    $res = $connection->query($sql1);
    if ($res->num_rows > 0) 
    {  
         while($data= $res->fetch_assoc()) 
         {
            $c=1;
            while($c<=4)
            {
              if($data['crectoption_no']==$c)
              {
                  echo '<b>Option &nbsp;'.$c.'&nbsp;:<input type="radio" id="O1" name="o" value="'.$data['crectoption_no'].'">
                  <label for="O1">'.$data['crectoption'].'</label></b><br /><br />';
              }
              if($data['Wrong1_no']==$c)
              {
                  echo '<b>Option &nbsp;'.$c.'&nbsp;:<input type="radio" id="O2" name="o" value="'.$data['Wrong1_no'].'">
                  <label for="O2">'.$data['wrong1'].'</label></b><br /><br />';
              }
              if($data['Wrong2_no']==$c)
              {
                  echo '<b>Option &nbsp;'.$c.'&nbsp;:<input type="radio" id="O3" name="o" value="'.$data['Wrong2_no'].'">
                  <label for="O3">'.$data['wrong2'].'</label></b><br /><br />';
              }
              if($data['Wrong3_no']==$c)
              {
                  echo '<b>Option &nbsp;'.$c.'&nbsp;:<input type="radio" id="O4" name="o" value="'.$data['Wrong3_no'].'">
                  <label for="O4">'.$data['wrong3'].'</label></b><br /><br />';
              }
              $c++;
            }
         }
    }

    if($pre_q!=$pre_qid)
    {
      echo '<form><div><button type="submit" name="next">Save & Next</button></div>';   
    }
    if($pre_q!=1)
    {
        echo '</div><button type="submit" name="prev">Previous</button></div></form>'; 
    }
    if($pre_q==$pre_qid)
    {
        echo '<form action="result.php" method="POST"><button type="submit">Finish attempt</button></form>';
    }
?>
</html>