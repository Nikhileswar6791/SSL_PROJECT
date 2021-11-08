<!DOCTYPE html>
<html>
<body>
 <?php
$Server= "localhost";
$Username = "root";
$Password = "";
$dbasename = "project";
$connection = new mysqli($Server, $Username, $Password, $dbasename);
  $sql_5 = "SELECT instruct_no,instruct FROM instructions";
  $result1 = $connection->query($sql_5);
  if ($result1->num_rows > 0) 
  {
    echo "<u>Instructions that are present in the exam now</u>:<br><br>";
    while($row1 = $result1->fetch_assoc()) 
    {
      echo " ".$row1["instruct_no"].". ". $row1["instruct"].".<br><br>";
    }
  } 
  else {
  echo "There are no instructions available.<br><br>";
  }
 ?>
 <form action="new.php" method="POST">
        Select Instruction Number that you want to delete:<input type="number" name="ins1no" required><br><br/>
        <button type="submit" name="ins1_delete">Delete Instruction</button><br/><br/><br/><br/>
 </form>
<div >
<form action="admin.php" type="post">
	<button type="submit" > <--Go back </button>
</form>
</div>
</body>
</html>
