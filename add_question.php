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
  $sql5_1 = "SELECT Questions,Question_no FROM questions";
  $result1 = $connection->query($sql5_1);
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
        Add Question Number:<br><input type="number" name="qno" required><br><br/>
        Add Question:<br><input type="text" name="ques" required><br><br/>
        Correct answer:<br><input type="text" name="crect" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="crectno" required><br><br><br/>
        Wrong answer-1:<br><input type="text" name="w1" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w1no" required><br><br><br/>
        Wrong answer-2:<br><input type="text" name="w2" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w2no" required><br><br><br/>
        Wrong answer-3:<br><input type="text" name="w3" required><br>
        Place at which this option should be visible(1-4):<input type="number" name="w3no" required><br><br><br/>
        <button type="submit" name="add">Add question</button><br/><br/><br/><br/>
 </form>
<div >
<form action="admin.php" type="post">
	<button type="submit" > <--Go back </button>
</form>
</div>
</body>
</html>
