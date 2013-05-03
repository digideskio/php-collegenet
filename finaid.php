<?php 
session_start(); 
if($_SESSION['logged']){ 
    include("menuLogged.php");
}
else {
    include("menu.php");
}  
?>
				<h1><span class="off">Welcome to College Connect</span></h1>
                <br>
            </div>

            <div id="content_bottom"></div>
        </div>

    </div>
</body>
</html>
