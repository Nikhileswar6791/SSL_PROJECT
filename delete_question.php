<!DOCTYPE html>
<html>
<body>
 <h2>Questions that are present in the exam now:</h2>
 <?php
$Server= "localhost";
$Username = "root";
$Password = "";
$dbasename = "project";
$connection = new mysqli($Server, $Username, $Password, $dbasename);
  $sql_5 = "SELECT Questions,Question_no FROM questions";
  $result1 = $connection->query($sql_5);
  if ($result1->num_rows > 0) 
  {
    while($row1 = $result1->fetch_assoc()) 
    {
      echo " ".$row1["Question_no"].". ". $row1["Questions"].".<br><br>";
    }
  } 
  else {
  echo "There is no exam available.<br><br>";
  }
 ?>
 <form action="new.php" method="POST">
        Select Question Number that you want to delete:<br><input type="number" name="q1no" required><br><br/>
        <button type="submit" name="delete">Delete question</button><br/><br/><br/><br/>
 </form>
<div >
<form action="admin.php" type="post">
	<button type="submit" > <--Go back </button>
</form>
</div>
</body>
</html>
