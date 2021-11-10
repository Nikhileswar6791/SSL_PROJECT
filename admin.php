<!DOCTYPE html>
<html>
<head>
    <style>
    body 
    {
    background-size: cover;
    background-color:lightpink;
    }

    button {
        background-color:blue;
        color: white;
        padding: 14px 20px;
        margin: 4px 0;
        
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

<h1 style="text-color:red"><u>ADMIN PAGE</u></h1>
<div class="container" style="text-align:right">
    <form class="modal-content animate" action="index.php" method="POST">
                     
                <button type="submit" name="go">Log Out</button>
         
    </form>
</div>
 <form action="new.php" method="POST">
        Duration of exam(in minutes): <input type="number" name="dur" required><br><br>
        <button type="submit" name="create_1">Set Time</button><br/><br/><br/>
 </form>
 <h2><u>Change in Instruction</u></h2>
 <form action="add_instruction.php" method="POST">
       <button type="submit" name="inst_1">Add instructions</button><br/><br/><br/>
 </form>
 <form action="delete_instruction.php" method="POST">
       <button type="submit" name="inst_2">Delete instructions</button><br/><br/><br/><br/>
 </form>
 <h2><u>Change in Question</u></h2>
 <form action="add_question.php" method="POST">
        <button type="submit" name="add_1">Add question</button><br/><br/><br/>
 </form>
 <form action="delete_question.php" method="POST">
        <button type="submit" name="delete_1">Delete question</button><br/><br/>
 </form>
 <form action="modify_question.php" method="POST">
        <button type="submit" name="modify_1">Modify question</button><br/><br/><br/><br/>
 </form>
<div >
<form action="index.php" type="post">
	<button type="submit" style="background-color:red" > <--Go to LOGIN Page </button>
</form>
</div>
</body>
</html>
