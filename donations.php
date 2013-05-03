<?php 
session_start(); 
if($_SESSION['logged']){ 
    include("menuLogged.php");
}
else {
    include("menu.php");
}
?>
                <h1>Browse <span class="off">College Projects</span></h1>
                <br />
                <table cellpadding="5" border="1px">
                    <tr>
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Project Goal</th>
                        <th>Total Funds Recieved</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                <?php
	             if($_SESSION['type'] != True) {
		          echo "<form action='addproject.php' method='POST'> <tr>";
			   echo "<td><input type='text' name='projName' value='" . $projName . "' /></td>";
			   echo "<td><textarea rows='3' cols='50' name='projDesc' />" . $projDesc . "</textarea></td>";
			   echo "<td><input type='text' name='projGoal' value='" . $projGoal . "'/></td>";
			   echo "<td>----</td>";
		          echo "<td><input type='text' name='projAmount' value='" . $projAmount . "'/></td>";
			   echo "<td><input type='submit' value='Add Project' /></td>";
			   echo "</tr> </form>";
		      } 
                    $dbHost = "127.0.0.1";        //Location Of Database usually its localhost 
                    $dbUser = "fsef12g7";         //Database User Name 
                    $dbPass = "fsef12g7";         //Database Password 
                    $dbDatabase = "fsef12g7";     //Database Name 
     
                    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
                    //Connect to the databasse 
                    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
                    //Selects the database 
     
                    $sql = mysql_query("SELECT * FROM Projects");
                    while($row = mysql_fetch_array($sql)) {
                        if((bool)$row['Status'] === TRUE) {
                            echo "<tr bgcolor='green'>";
                                echo "<td>".$row['ProjectName']."</td>";
                                echo "<td width='300px'>".$row['ProjectDesc']."</td>";
                                echo "<td>$".$row['ProjectGoal']."</td>";
                                echo "<td>$".$row['ProjectFund']."</td>";
                                echo "<td>----</td>";
                                echo "<td>Goal reached!</td>";
                            echo "</tr>";
                        }
                        else {
                            echo "<form action='donate.php' method='POST'> <tr>";
				    echo "<input type='hidden' value='".$row['Project_ID']."' name='projID' />";
                                echo "<td>".$row['ProjectName']."</td>";
                                echo "<td width='300px'>".$row['ProjectDesc']."</td>";
                                echo "<td>$".$row['ProjectGoal']."</td>";
                                echo "<td>$".$row['ProjectFund']."</td>";
                                echo "<td><input type='text' name='projAmount'/></td>";
                                echo "<td><input type='submit' value='Donate' /></td>";
                            echo "</tr> </form>";
                        }
                    }
                ?>
                </table>
		  <span id="error"><?php echo $amountErr;?></span>
            </div>

            <div id="content_bottom"></div>
        </div>

    </div>
</body>
</html>
