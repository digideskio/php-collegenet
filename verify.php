<?php 
if(isset($_POST['submit'])){ 
    $dbHost = "127.0.0.1";        //Location Of Database usually its localhost 
    $dbUser = "fsef12g7";            //Database User Name 
    $dbPass = "fsef12g7";            //Database Password 
    $dbDatabase = "fsef12g7";    //Database Name 
     
    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
    //Connect to the databasse 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
    //Selects the database 
     
    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $usr = $_POST['username']; 
    $pas = $_POST['password']; 
    $sql = mysql_query("SELECT * FROM Users  
        WHERE Username='$usr' AND 
        Password_Digest='$pas' 
        LIMIT 1"); 
    if(mysql_num_rows($sql) == 1){ 
        $row = mysql_fetch_array($sql); 
        session_start(); 
        $_SESSION['username'] = $row['Username'];
        $_SESSION['userid'] = $row['User_ID'];
        $_SESSION['type'] = $row['Is_Student']; 
        $_SESSION['fname'] = $row['First_Name']; 
        $_SESSION['lname'] = $row['Last_Name']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: account.php"); // Modify to go to the page you would like 
        exit; 
    }
    else { 
        $validationErr = 'Incorrect Login';
        include 'login.php'; 
    } 
}
else {    
    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: index.php");     
    exit; 
} 
?>

