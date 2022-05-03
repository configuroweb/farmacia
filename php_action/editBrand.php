<?php 	

require_once 'core.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$brandId = $_GET['id'];
//echo $brandId;exit;
if($_POST) {	
//echo "123";exit;
	$brandName = $_POST['brandName'];
  $brandStatus = $_POST['brandStatus']; 
  
//echo $brandId;exit;
	$sql = "UPDATE brands SET brand_name = '$brandName', brand_active = '$brandStatus' WHERE brand_id = '$brandId'";
//echo $sql;exit;
	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../Brand.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST