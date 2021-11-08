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
        Select Question Number:<br><input type="number" name="q2no" required><br><br/>
        Add new Question:<br><input type="text" name="ques2" required><br><br/>
        Correct answer:<br><input type="text" name="crect2" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="crectno2" required><br><br><br/>
        Wrong answer-1:<br><input type="text" name="w1_2" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w1no2" required><br><br><br/>
        Wrong answer-2:<br><input type="text" name="w2_2" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w2no2" required><br><br><br/>
        Wrong answer-3:<br><input type="text" name="w3_2" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w3no2" required><br><br><br/>
        <button type="submit" name="modify">Modify question</button><br/><br/><br/><br/>
 </form>
<div >
<form action="admin.php" type="post">
	<button type="submit" > <--Go back </button>
</form>
</div>
</body>
</html>
