<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = 0;
    if(!$_POST['firstname']) {
        $firstnameErr = 'No first name entered';
        $errors += 1;
    }
    if(!$_POST['lastname']) {
        $lastnameErr = 'No last name entered';
        $errors += 1;
    }
    if(!$_POST['campusid']) {
        $campusidErr = 'No ID number entered';
        $errors += 1;
    }
    if($_POST['campusid']) {
        $campusid = $_POST['campusid'];
        $case = ucfirst($campusid[0]);
        if($case != 'F' && $case != 'S') {
            $campusidErr = 'Invalid Campus ID';
            $errors += 1;
        }
        $connect = mysql_connect("127.0.0.1","fsef12g7","fsef12g7") or die ("Couldn't connect to database.");
        mysql_select_db("fsef12g7") or die ("Couldn't find database.");
        
        $query = mysql_query("SELECT * FROM Users WHERE Campus_ID = '$campusid'");
        $numrows = mysql_num_rows($query);

        if($numrows != 0) {
            $campusidErr = 'ID already exists';
            $errors += 1;
        }
    }
    if(!$_POST['email']) {
        $emailErr = 'No email entered';
        $errors += 1;
    }
    if($_POST['email']) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid email address';
            $errors += 1;
        }
    }
    if(!$_POST['username']) {
        $usernameErr = 'No username entered';
        $errors += 1;
    }
    if($_POST['username']) {
        $username = $_POST['username'];
        $connect = mysql_connect("127.0.0.1","fsef12g7","fsef12g7") or die ("Couldn't connect to database.");
        mysql_select_db("fsef12g7") or die ("Couldn't find database.");
 
        $query = mysql_query("SELECT * FROM Users WHERE Username = '$username'");
        $numrows = mysql_num_rows($query);

        if($numrows != 0) {
            $usernameErr = 'Username exists; Please select another!';
            $errors += 1;
        }
    }
    if(!$_POST['verifypwd']) {
        $passwordErr = 'Password is required entered';
        $errors += 1;
    }
    if($_POST['pwd'] != $_POST['verifypwd']) {
        $passwordErr = 'Passwords do not match';
        $errors += 1;
    }
}

// were there any errors?
if($errors > 0) {
    if ($_POST['firstname']) {
        $firstname = $_POST['firstname'];
    }
    if ($_POST['lastname']) {
        $lastname = $_POST['lastname'];
    }
    if ($_POST['campusid']) {
        $campusid = $_POST['campusid'];
    }
    if ($_POST['email']) {
        $email = $_POST['email'];
    }
    if ($_POST['username']) {
        $username = $_POST['username'];
    }
    // display the previous form
    include 'register.php';
}
else {
    if($_POST['campusid']) {
        $case = ucfirst($_POST['campusid'][0]);
        if($case == 'F') {
            $type = false;
        }
        elseif ($case == 'S') {
            $type = true;
        }
    }
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];       
    }
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $campusid = $_POST['campusid'];
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $connect = mysql_connect("127.0.0.1","fsef12g7","fsef12g7") or die ("Couldn't connect to database.");
    mysql_select_db("fsef12g7") or die ("Couldn't find database.");


    $query = mysql_query("SELECT * FROM Users");
    $numrows = mysql_num_rows($query);

    mysql_query("INSERT INTO Users (First_Name, Last_Name, Campus_ID, Email, Username, Password_Digest, Is_Student) VALUES ('$firstname', '$lastname', '$campusid', '$email', '$username', '$password', '$type')");
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['type'] = $type; 
    $_SESSION['fname'] = $firstname; 
    $_SESSION['lname'] = $lastname; 
    $_SESSION['logged'] = TRUE;
 
    // display the account page
    header("Location: account.php");
    exit;
}
?>
