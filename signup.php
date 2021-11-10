<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-color: darkcyan;">
<?php
session_start();
$Server= "localhost";
$Username = "root";
$Password = "";
$dbasename = "project";
$conn = new mysqli($Server, $Username, $Password, $dbasename);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['signup']))
{
        $user= $_POST['uname'];
        $roll=$_POST['roll'];
        $email =$_POST['email'];
        $phone=$_POST['phno'];
        $pass=$_POST['psw'];
        $repass=$_POST['rpsw'];
        if($pass==$repass)
        {
             $c=0;
            $sql1 = "SELECT*FROM users";
             $res = $conn->query($sql1);
            if ($res->num_rows > 0) 
            {  
                while($data = $res->fetch_assoc()) 
               {
                  if($data['rollno']==$roll)
                  {
                         $c=1;
                         break;
                  } 
                }
            }
            if($c==1)
            {
                echo "<script>window.location.href='index.php';
                         alert('Roll number already exists....');
                         </script>";
            }
            if($c==0)
            {
            $sql3="INSERT INTO users (username,rollno,email,contact,password,q_no)
                   VALUES ('$user','$roll','$email','$phone','$pass','1')";
            if ($conn->query($sql3) === TRUE) 
            {
                $_SESSION['email']=$email;
                $_SESSION['psw']=$pass;
                $_SESSION['roll']=$roll;
                $tab1= "CREATE TABLE tab_$roll
               (
                 q_no INT(50) NOT NULL,
                 selected_option INT(5)
               )";
               $conn->query($tab1);
               header("location:main.php?q=1");
            } 
            else 
            {
              echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        }
        else
        {
            echo "Password and Re_enter Password should be same";
        }
        } 
}
else if(isset($_POST['signin']))
{
  if(isset($_POST['email']) && isset($_POST['psw']))
  {
    $fipass=$_POST['email'];
    $pass=$_POST['psw'];
    if($pass=="ADMIN@2021" && $fipass=="admin@gmail.com")
    {
            header("location:admin.php?q=1"); 
    }     
    $sql1 = "SELECT*FROM users WHERE email='$fipass'";
    $c=0;
      $res = $conn->query($sql1);
      if ($res->num_rows > 0) 
      {  
         while($data= $res->fetch_assoc()) 
         {
               if($data['password']==$pass)
               {
                  $c=1;
                  $roll=$data['rollno'];
               } 
         }
         if($c==1)
         {
            $_SESSION['email']=$fipass;
            $_SESSION['psw']=$pass;
            $_SESSION['roll']=$roll;
            $sql="UPDATE users SET q_no=1 WHERE email='$fipass' AND password='$pass'";
            $conn->query($sql);
            $sql1="DROP TABLE tab_$roll";
            $conn->query($sql1);
             $tab1= "CREATE TABLE tab_$roll
            (
               q_no INT(50) NOT NULL,
               selected_option INT(5)
             )";
            $conn->query($tab1);
            header("location:main.php?q=1");
      }  
     else 
     {
        echo "<script>window.location.href='index.php';
                  alert('Password Incorrect....');
                  </script>";
     }
  }
   else 
   {
        echo "<script>window.location.href='index.php';
                  alert('Please sign up first to continue....');
                  </script>";
   }
}
}
?>
</body>
</html>
