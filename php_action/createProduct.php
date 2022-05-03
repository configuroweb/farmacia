<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $productName 		= $_POST['productName'];
  //echo $productName ;exit;
  $productImage 	= $_POST['productImage'];
  $quantity 		= $_POST['quantity'];
  $rate 			= $_POST['rate'];
  $brandName 		= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $mrp 	= $_POST['mrp'];
  $bno 	= $_POST['bno'];
  $expdate 	= $_POST['expdate'];
  $productStatus 	= $_POST['productStatus'];
	//$type = explode('.', $_FILES['productImage']['name']);
	$image = $_FILES['Medicine']['name'];
$target = "../assets/myimages/".basename($image);
$upload = move_uploaded_file($_FILES['Medicine']['tmp_name'], $target);
if ($upload) {
 // @unlink("uploadImage/Profile/".$_POST['old_image']);
	//echo $_FILES['image']['tmp_name'];
	//cho $target;exit;
      $msg = "Image uploaded successfully";
      echo $msg;
    }else{
      $msg = "Failed to upload image";
      echo $msg;exit;
    }
	$orderDate=date('Y-m-d');
				$sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, rate,mrp,bno,expdate,added_date,active, status) 
				VALUES ('$productName', '$image', '$brandName', '$categoryName', '$quantity', '$rate', '$mrp', '$bno', '$expdate', '$orderDate', '$productStatus', 1)";
//echo $sql;exit;
				if($connect->query($sql) === TRUE) { //echo "sdafsf";exit;
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../product.php');	
				} 
				
			// /else	
		// if
	// if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST