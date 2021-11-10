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
        width:10%;
    }
    body 
    {
    background-size: cover;
    background-color:LightGray;
    }
    div{
      border: 4px solid black;
      width: 80%;
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
<div  style="text-align:right">
    <form class="modal-content animate" action="index.php" method="POST">
                     
                <button type="submit" name="go">Log Out</button>
         
    </form>
</div>
<form action="scores.php" method="POST">
<button type="submit">View Scores</button>
</form><br/>
<form action="instructions.php" method="POST">
      <button type="submit">Read Instructions</button>
	</form>
</body>
</html>
