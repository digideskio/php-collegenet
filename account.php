<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login.php"); 
    exit; 
}
?>
<?php include("menuLogged.php"); ?>
                <h1><span class="off">Welcome to College Connect</span></h1>
                <br>
                Welcome, <?php echo $_SESSION['username'] ?>
            </div>

            <div id="content_bottom"></div>
        </div>

    </div>
</body>
</html>
