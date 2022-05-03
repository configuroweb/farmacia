<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
//echo $startDate;exit;
	//$date = DateTime::createFromFormat('m/d/Y',$startDate);

	//$start_date = $date->format("m/d/Y");

//echo $date;exit;

	$endDate = $_POST['endDate'];
	//$format = DateTime::createFromFormat('m/d/Y',$endDate);
	//$end_date = $format->format("Y-m-d");
$date=date('Y-m-d');
	$sql = "SELECT * FROM product WHERE 	added_date>= '$startDate' AND added_date<= '$endDate' and expdate<='".$date."' AND status = 1";
	//echo $sql;exit;
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:80%;">
		<tr>
			<th>Product Name</th>
			<th>Manufacturer Name</th>
			
			<th>quantity</th>
			<th>MRP</th>
			<th>expdate</th>
			<th>added_date</th>
		</tr>

		<tr>';
		$totalAmount = 0;
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr><td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['brand_id'].'</center></td>
				
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['mrp'].'</center></td>
				<td><center>'.$result['expdate'].'</center></td>
					<td><center>'.$result['added_date'].'</center></td>
			</tr>';	
			$totalAmount += $result['mrp'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	
	echo $table;

}
//header('location:../report.php');
?>