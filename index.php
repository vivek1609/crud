<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    
</head>

<body bgcolor="#B8FBFB">
    <center><font size="+5">
    <div id="header">
        Welcome to my page!
    </div>
</font>
<hr>
    <?php
    if(isset($_SESSION['valid'])) {			
        include("connection.php");					
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>				
       <center><font size="+3"> Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <hr>
        <a href='view.php'>View and Add Products</a>
        <br/><br/>
    </font>
    <?php	
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>
    <div id="footer">
        <hr>
        Created by Vivek Rai
    </div>
</body>
</html>