<!DOCTYPE html>
<html>

<style>
    body 
    {
    background-image: url('online image.jpg');
    background-size: cover;
    }
    /*assign full width inputs*/
    input[type=text],
    input[type=password],
    input[type=number]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    
    /*set a style for the buttons*/
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    
    /* set a hover effect for the button*/
    button:hover {
        opacity: 0.9;
    }
    
    /*set extra style for the cancel button*/
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }
    
    /*centre the display image inside the container*/
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }
    
    /*set image properties*/
    img.avatar {
        width: 40%;
        border-radius: 50%;
    }
    
    /*set padding to the container*/
    .container {
        padding: 16px;
    }
      
    /*set the forgot password text*/
    span.psw {
        float: right;
        padding-top: 16px;
    }
    
    /*set the Modal background*/
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }
    
    /*style the model content box*/
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
    }
    
    /*style the close button*/
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }
      
    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }
    
    /* add zoom animation*/
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }
      
    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }
        to {
            -webkit-transform: scale(1)
        }
    }
      
    @keyframes animatezoom {
        from {
            transform: scale(0)
        }
        to {
            transform: scale(1)
        }
    }
      
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
  
<body>
     <?php
       $Server = "localhost";
       $Username = "root";
       $Password = "";
       $connection= new mysqli($Server, $Username, $Password);
       if ($connection->connect_error) 
       {
           die("Connection failed: " . $connection->connect_error);
       }
       $Database = "CREATE DATABASE project";
       $connection->query($Database);
       $connection->select_db("project");
       $tab1= "CREATE TABLE users
       (
          username VARCHAR(120) NULL DEFAULT(NOT NULL),
          rollno INT(30),
          email VARCHAR(50),
          contact BIGINT(11),
          password VARCHAR(30),
          q_no INT(50)
       )";
       $connection->query($tab1);
       $connection->close();
       ?>
    <script>
        function validateForm() 
        {
            var y = document.forms["form"]["uname"].value;  var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}
            var z =document.forms["form"]["roll"].value;if (z == null || z == "") {alert("Roll Number must be filled out.");return false;}
            var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}
            var a = document.forms["form"]["psw"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
            var b = document.forms["form"]["rpsw"].value;if (a!=b){alert("Passwords must match.");return false;}
        }
</script>
    <h2 style="text-align:center"><u>WELCOME TO ONLINE EXAMINATION SYSTEM</u></h2>
    <div class="container" style="text-align:right">
    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign up</button>
    </div>

    <div class="container">
    <form class="modal-content animate" action="signup.php" method="POST">
            
            <div class="container">
                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
  
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                
                <button type="submit" name="signin">Sign in</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>
        </form>
    </div>

    <div id="id02" class="modal">
  
        <form class="modal-content animate" name="form" onSubmit="return validateForm()" action="signup.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
               
            </div>
  
            <div class="container">

                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label><b>Roll Number</b></label>
                <input type="number" placeholder="Enter Roll Number" name="roll" required>

                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label><b>Phone Number</b></label>
                <input type="number" placeholder="Enter Phone Number" name="tel" required>
  
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                
                <label><b>Re-enter Password</b></label>
                <input type="password" placeholder="Enter Password" name="rpsw" required>
                
                <button type="submit" name="signup">Sign up</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>
  
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>
  
    
    <script>
        var modal = document.getElementById('id02');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    
</body>
  
</html>
