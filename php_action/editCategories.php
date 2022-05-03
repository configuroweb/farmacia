<?php 	

require_once 'core.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$categoriesId = $_GET['id'];
if($_POST) {	

	$brandName = $_POST['categoriesName'];
  $brandStatus = $_POST['categoriesStatus']; 
  //$categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE categories SET categories_name = '$brandName', categories_active = '$brandStatus' WHERE categories_id = '$categoriesId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../categories.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST