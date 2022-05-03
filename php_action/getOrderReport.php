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

	$sql = "SELECT * FROM orders WHERE 	orderDate>= '$startDate' AND orderDate<= '$endDate' and delete_status = 0";
	//echo $sql;exit;
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:80%;">
		<tr>
			<th>Utilisation Date</th>
			<th>Client Name</th>
			
			<th>Contact</th>
			<th>Grand Total</th>
		</tr>

		<tr>';
		$totalAmount = 0;
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				<td><center>'.$result['orderDate'].'</center></td>
				<td><center>'.$result['clientName'].'</center></td>
				
				<td><center>'.$result['clientContact'].'</center></td>
				<td><center>'.$result['grandTotalValue'].'</center></td>
			</tr>';	
			$totalAmount += $result['grandTotalValue'];
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