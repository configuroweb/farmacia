<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>

<?php include('../constant/connect.php'); ?>
<?php

require_once 'php_action/core.php';

if ($_POST) {

	$startDate = $_POST['startDate'];
	//echo $startDate;exit;
	//$date = DateTime::createFromFormat('m/d/Y',$startDate);

	//$start_date = $date->format("m/d/Y");

	//echo $date;exit;

	$endDate = $_POST['endDate'];
	//$format = DateTime::createFromFormat('m/d/Y',$endDate);
	//$end_date = $format->format("Y-m-d");
	$date = date('Y-m-d');
	$sql = "SELECT * FROM product WHERE added_date>= '$startDate' AND added_date<= '$endDate' and expdate<'" . $date . "' AND status = 1";
	//echo $sql;exit;
	$query = $connect->query($sql);

?>
	<div class="page-wrapper">
		<div class="container-fluid">
			<table border="1" cellspacing="0" cellpadding="0" style="width:80%;">
				<tr>
					<th>Nombre Medicina</th>
					<th>Proveedor</th>

					<th>Cantidad</th>
					<th>PRM</th>
					<th>Fecha Expiración</th>
					<th>Fecha Ingreso</th>
				</tr>

				<tr><?php
					$totalAmount = 0;
					while ($result = $query->fetch_assoc()) { ?>

						<tbody>
							<tr>
								<?php $d1 = date('Y-m-d');
								//echo $d1.$row['expdate'];exit;
								if ($result['expdate'] > $d1) { //echo "abc1"; 
								?>

									<td> <label class="label label-success"><?php echo $result['product_name']; ?></label></td>
								<?php  }
								if ($result['expdate'] < $d1) { //echo "abc"; 
								?>
									<td><label class="label label-danger"><?php echo $result['product_name']; ?></label></td>

								<?php
								}
								?>

								<td>
									<center><?php echo $result['brand_id']; ?></center>
								</td>

								<td>
									<center><?php echo $result['quantity']; ?></center>
								</td>
								<td>
									<center><?php echo $result['mrp']; ?></center>
								</td>
								<td>
									<center><?php echo $result['expdate']; ?></center>
								</td>
								<td>
									<center><?php echo $result['added_date']; ?></center>
								</td>
							</tr>
						</tbody>
				<?php $totalAmount += $result['mrp'];
					}
					$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total</center></td>
			<td><center>' . $totalAmount . '</center></td>
		</tr>
	</table>
	';
					echo $table;
				}
				//header('location:../report.php');
				?>
		</div>
	</div>

	<?php include('./constant/layout/footer.php'); ?>