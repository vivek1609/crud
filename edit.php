<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
	$category = $_POST['category'];
    $product = $_POST['product'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    // $image =$_POST['image'];	
	
    // checking empty fields
    if(empty($category) ||  empty($product) || empty($qty) || empty($price) ) {				
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
    } else {	
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET category='$category', product='$product', qty='$qty', price='$price' WHERE id=$id");
		
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $category = $res['category'];
    $product =$res['product'];
    $qty = $res['qty'];
    $price = $res['price'];
    $image =$res['image'];
}
?>
<html>
<head>	
    <title>Edit Data</title>
</head>

<body bgcolor="#B8FBFB">
<center>
        <font="+3">
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
	
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Category</td>
                <td><input type="text" name="category" value="<?php echo $category;?>"></td>
            </tr>
            <tr> 
                <td>Product</td>
                <td><input type="text" name="product" value="<?php echo $product;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</center>
</font>
</body>
</html>