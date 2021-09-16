<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>
<head>
    <title>Add Data</title>
</head>

<body bgcolor="#B8FBFB">
    <center>
        <font="+3">
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
    $category =$_POST['category'];
    $product = $_POST['product'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $loginId = $_SESSION['id'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;
		
    // checking empty fields
    if(empty($category) ||  empty($product) || empty($qty) || empty($price)) {				
        if(empty($category)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($product)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		
        if(empty($qty)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
		
        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }
		
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
			
        //insert data to database	
        $result = mysqli_query($mysqli, "INSERT INTO products(category, product, qty, price, login_id, image) VALUES('$category','$product','$qty','$price', '$loginId','$filename')");
		if($result)
        {        //display success message
            echo '<script>alert("Added Sucessfully")</script>';
            
            echo "<font color='green'>Data added successfully.";
            echo "<br/><a href='view.php'>View Result</a>";
        }
        else
        {
            echo"<font color='red'>Somethind went wrong.";
        }


        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
    }
}
?>
<center>
</font>
</body>
</html>