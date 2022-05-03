<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$orderId = $_POST['orderId'];

	$orderDate 						= date('Y-m-d', strtotime($_POST['orderDate']));
  $clientName 					= $_POST['clientName'];
  $clientContact 				= $_POST['clientContact'];
  $subTotalValue 				= $_POST['subTotalValue'];
  //$vatValue 						=	$_POST['vatValue'];
  $totalAmountValue     = $_POST['totalAmountValue'];
  $discount 						= $_POST['discount'];
  $grandTotalValue 			= $_POST['grandTotalValue'];
  $paid 								= $_POST['paid'];
  $dueValue 						= $_POST['dueValue'];
  $paymentType 					= $_POST['paymentType'];
  $paymentStatus 				= $_POST['paymentStatus'];
  $paymentPlace 				= $_POST['paymentPlace'];
  $gstn 				= $_POST['gstn'];
	$userid 				= $_SESSION['userId'];
				
	$sql = "UPDATE orders SET orderDate = '$orderDate',clientName = '$clientName', 	clientContact = '$clientContact', subTotal = '$subTotalValue', totalAmount = '$totalAmountValue', discount = '$discount', grandTotalValue = '$grandTotalValue', paid = '$paid', paymentType = '$paymentType',paymentStatus = '$paymentStatus',paymentPlace = '$paymentPlace' , gstn = '$gstn' WHERE id = {$orderId}";
	//echo $sql;exit;	
	$connect->query($sql);
	$readyToUpdateOrderItem = false;
	// add the quantity from the order item to product table
	for($x = 0; $x < count($_POST['productName']); $x++) {		
		//  product table
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
	//echo $updateProductQuantitySql;exit;
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);			//echo print_r($updateProductQuantityData);exit;
			
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			// order item table add product quantity
			$orderItemTableSql = "SELECT order_item.quantity FROM order_item WHERE order_item.lastid = {$orderId}";
			//echo $orderItemTableSql;exit;
			$orderItemResult = $connect->query($orderItemTableSql);
			$orderItemData = $orderItemResult->fetch_row();
//echo print_r($orderItemData);exit;
			$editQuantity = $updateProductQuantityResult[0] + $orderItemData[0];						//echo print_r($editQuantity);exit;	

			$updateQuantitySql = "UPDATE product SET quantity = $editQuantity WHERE product_id = ".$_POST['productName'][$x]."";
			//echo $updateQuantitySql;exit;
			$connect->query($updateQuantitySql);		
		} // while	
		
		if(count($_POST['productName']) == count($_POST['productName'])) {
			$readyToUpdateOrderItem = true;			
		}
	} // /for quantity

	// remove the order item data from order item table
	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$removeOrderSql = "DELETE FROM order_item WHERE lastid = {$orderId}";
		//echo $removeOrderSq;exit;
		$connect->query($removeOrderSql);	
	} // /for quantity

	if($readyToUpdateOrderItem) {
			// insert the order item data 
		for($x = 0; $x < count($_POST['productName']); $x++) {			
			$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
			$updateProductQuantityData = $connect->query($updateProductQuantitySql);
			
			while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
				$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
					// update product table
					$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
					$connect->query($updateProductTable);

					// add into order_item
				$orderItemSql = "INSERT INTO order_item (lastid,productName, quantity, rate, total) 
				VALUES ({$orderId},'".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."')";
//echo $orderItemSql;exit;
				$connect->query($orderItemSql);		
			} // while	
		} // /for quantity
	}

	

	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";
	//echo"gfg";exit;		
	$connect->close();
	header('location:'.$_SERVER['HTTP_REFERER']);

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);