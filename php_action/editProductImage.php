<?php 	

require_once 'core.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$productId = $_GET['id'];

if($_POST) {		

$image = $_FILES['productImage']['name'];
$target = "../assets/myimages/".basename($image);

if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target)) {
 // @unlink("uploadImage/Profile/".$_POST['old_image']);
	//echo $_FILES['image']['tmp_name'];
	//cho $target;exit;
      $msg = "Image uploaded successfully";
      echo $msg;
    }
    else{
      $msg = "Failed to upload image";
      echo $msg;exit;
    }		
			

				$sql = "UPDATE product SET product_image = '$image' WHERE product_id = $productId";				
//echo $sql;exit;
				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";
					header('location:../product.php');
				} 
				else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating product image";
				}
			// /else	
		
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
?>
