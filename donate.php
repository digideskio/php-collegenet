<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = 0;
  if(!$_POST['projAmount']) {
        $amountErr = 'No amount specified';
        $errors += 1;
  }
}

// were there any errors?
if($errors > 0) {
    if($_POST['projAmount']) {
        $projAmount = $_POST['projAmount'];
    }
    // display the previous form
    include 'donations.php';
}
else {
    $projID = $_POST['projID'];
    $projAmount = (float) $_POST['projAmount'];

    $connect = mysql_connect("127.0.0.1","fsef12g7","fsef12g7") or die ("Couldn't connect to database.");
    mysql_select_db("fsef12g7") or die ("Couldn't find database.");

    $select = mysql_query("SELECT ProjectGoal, ProjectFund, Status FROM Projects WHERE Project_ID=".$projID);
    while($row = mysql_fetch_array($select)) {
	 $goal = (float) $row['ProjectGoal'];
	 $oldAmount = (float) $row['ProjectFund'];
         $newAmount = (float) $row['ProjectFund'] + $projAmount;
	 $status = 0;
    }

    if($newAmount >= $goal) {
        $newAmount = $goal;
        $status = 1;
    }
    
    $query = "UPDATE Projects SET ProjectFund=".$newAmount.", Status=".$status." WHERE Project_ID=".$projID;
    mysql_query($query);

    // display the donations page
    header("Location: donations.php");
    exit;
}

?>
