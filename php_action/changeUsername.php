<?php 

require_once 'core.php';
include('./constant/check.php');
if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());
//echo $_POST['username'];exit;
	$user_id = $_SESSION['userId'];
	$username = $_POST['username'];
	$userId = $_POST['user_id'];
//echo $user_id;exit;
//echo $username;
	$sql = "UPDATE users SET username = '$username' WHERE user_id = {$user_id}";
	//echo $sql;exit;
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
		header('location:../setting.php');		
	} 
	else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

	$connect->close();

	echo json_encode($valid);

}

?>