<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>
<hr>
<body bgcolor="#B8FBFB">
    <font="+3">
    <center>
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/><hr>
	
<table width='80%' border=0 align="center" font="+3" cellspacing="20">
    <tr bgcolor='#CCCCCC'>
        <td>Category</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>File Select</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {		
        echo "<tr>";
        echo "<td>".$res['category']."</td>";
        echo "<td>".$res['product']."</td>";
        echo "<td>".$res['qty']."</td>";
        echo "<td>".$res['price']."</td>";
        echo "<td><img src='image/".$res['image']."'></td>";	
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
    }
    ?>
</table>	
</body>
</html>