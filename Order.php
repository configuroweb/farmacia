<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>


<?php include('./constant/connect');
$user = $_SESSION['userId'];
$sql = "SELECT  uno, orderDate, clientName, clientContact,paymentStatus,id FROM orders WHERE delete_status = 0";
$result = $connect->query($sql);

//echo $sql;exit;

//echo $itemCountRow;exit; 
?>
<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> Gestionar Facturas</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Gestionar Facturas</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">




        <div class="card">
            <div class="card-body">

                <a href="add-order.php"><button class="btn btn-primary">Generar Factura</button></a>

                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Fecha Factura</th>
                                <th>Nombre Cliente</th>
                                <th>Contacto</th>

                                <th>Estado del Pago</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {

                                $no += 1;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?php echo $row['orderDate'] ?></td>
                                    <td><?php echo $row['clientName'] ?></td>
                                    <td><?php echo $row['clientContact'] ?></td>


                                    <td><?php if ($row['paymentStatus'] == 1) {

                                            $paymentStatus = "<label class='label label-success' ><h4>Pago Completo</h4></label>";
                                            echo $paymentStatus;
                                        } else if ($row['payment_status'] == 2) {
                                            $paymentStatus = "<label class='label label-danger'><h4>Pago Pactial</h4></label>";
                                            echo $paymentStatus;
                                        } else {
                                            $paymentStatus = "<label class='label label-warning'><h4>Pago Pendiente</h4></label>";
                                            echo $paymentStatus;
                                        } // /els
                                        ?></td>
                                    <td>

                                        <a href="editorder.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>



                                        <a href="php_action/removeOrder.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Deseas eliminar este registro?')"><i class="fa fa-trash"></i></button></a>

                                        <a href="invoiceprint.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-print"></i></button></a>


                                    </td>
                                </tr>

                        </tbody>
                    <?php
                            }

                    ?>
                    </table>
                </div>
            </div>
        </div>


        <?php include('./constant/layout/footer.php'); ?>