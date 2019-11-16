<?php
$con=mysqli_connect("localhost","root","","arkademy");

if($_GET['p']=='add_product'){
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$category = $_POST['category'];
    	$cashier = $_POST['cashier'];
        $sql=mysqli_query($con,"INSERT INTO product (id, name, id_category, id_cashier) VALUES ('','$name','$price','$category','$cashier')");
        if($sql)
        {
        	header("Location: index.php");
        }
}

if($_GET['p']=='delete_product'){
    	$id = $_GET['id'];
        $sql=mysqli_query($con,"DELETE FROM product WHERE id = '$id'");
        if($sql)
        {
        	header("Location: index.php");
        }
}

if($_GET['p']=='edit_product'){
    	$id = $_GET['id'];
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$category = $_POST['category'];
    	$cashier = $_POST['cashier'];
        $sql=mysqli_query($con,"UPDATE product SET name = '$name', price = '$price', id_category = '$category', id_cashier = '$cashier' WHERE id = '$id' ");
        if($sql)
        {
        	header("Location: index.php");
        }
}

if($_GET['p']=='add_cashier'){
    	$name = $_POST['name'];
        $sql=mysqli_query($con,"INSERT INTO cashier (id, name) VALUES ('','$name')");
        if($sql)
        {
        	header("Location: index.php");
        }
}

if($_GET['p']=='add_category'){
    	$name = $_POST['name'];
        $sql=mysqli_query($con,"INSERT INTO category (id, name) VALUES ('','$name')");
        if($sql)
        {
        	header("Location: index.php");
        }
}
?>