<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = 0;
  if(!$_POST['projName']) {
        $amountErr = 'No project name given!';
        $errors += 1;
  }
  if(!$_POST['projDesc']) {
        $amountErr = 'No project description!';
        $errors += 1;
  }
  if(!$_POST['projGoal']) {
        $amountErr = 'No project goal!';
        $errors += 1;
  }
  if(!$_POST['projAmount']) {
        $amountErr = 'No amount specified';
        $errors += 1;
  }

}

// were there any errors?
if($errors > 0) {
    if($_POST['projName']) {
        $projName = $_POST['projName'];
    }
    if($_POST['projDesc']) {
        $projDesc = $_POST['projDesc'];
    }
    if($_POST['projGoal']) {
        $projGoal = $_POST['projGoal'];
    }
    if($_POST['projAmount']) {
        $projAmount = $_POST['projAmount'];
    }
    // display the previous form
    include 'donations.php';
}
else {
    $projName = $_POST['projName'];
    $projDesc = $_POST['projDesc'];
    $projGoal = $_POST['projGoal'];
    $projAmount = (float) $_POST['projAmount'];

    $connect = mysql_connect("127.0.0.1","fsef12g7","fsef12g7") or die ("Couldn't connect to database.");
    mysql_select_db("fsef12g7") or die ("Couldn't find database.");
    
    $query = "INSERT INTO Projects (ProjectName, ProjectDesc, ProjectGoal, ProjectFund, Status) VALUES ('$projName', '$projDesc', '$projGoal', '$projAmount', 0)";
    mysql_query($query);

    // display the donations page
    header("Location: donations.php");
    exit;
}

?>
