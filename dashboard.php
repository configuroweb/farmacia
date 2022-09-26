<?php //error_reporting(1); 
?>
<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>

<?php


$lowStockSql = "SELECT * FROM product WHERE status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$lowStockSql1 = "SELECT * FROM brands WHERE brand_status = 1";
$lowStockQuery1 = $connect->query($lowStockSql1);
$countLowStock1 = $lowStockQuery1->num_rows;

$date = date('Y-m-d');
$lowStockSql3 = "SELECT * FROM product WHERE  expdate<'" . $date . "' AND status = 1";
//echo "SELECT * FROM product WHERE  expdate<='".$date."' AND status = 1" ;exit;
$lowStockQuery3 = $connect->query($lowStockSql3);
$countLowStock3 = $lowStockQuery3->num_rows;

$lowStockSql2 = "SELECT * FROM orders WHERE delete_status =0";
$lowStockQuery2 = $connect->query($lowStockSql2);
$countLowStock2 = $lowStockQuery2->num_rows;

//$connect->close();

?>

<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-wrapper">

    <!--     <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <div class="float-right"><h3 style="color:black;"><p style="color:black;"><?php echo date('l') . ' ' . date('d') . '- ' . date('m') . '- ' . date('Y'); ?></p></h3>
                    </div>
                    </div>
                
            </div> -->


    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-6 dashboard">
                <div class="card" style="background: #eb8038 ">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-support"></i></span>
                        </div>
                        <div class="media-body media-text-right">


                            <h2 class="color-white"><?php echo $countLowStock; ?></h2>
                            <a href="product.php">
                                <p class="m-b-0">Medicinas</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
                <div class="col-md-6 dashboard">
                    <div class="card" style="    background-color: #f05746 ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-agenda"></i></span>
                            </div>
                            <div class="media-body media-text-right">

                                <h2 class="color-white"><?php echo $countLowStock3; ?></h2>
                                <a href="product.php">
                                    <p class="m-b-0">Medicinas Vencidas</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
                <div class="col-md-6 dashboard">
                    <div class="card " style="    background-color: #46f9a0 ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-notepad"></i></span>
                            </div>
                            <div class="media-body media-text-right">

                                <h2 class="color-white"><?php echo $countLowStock2; ?></h2>
                                <a href="Order.php">
                                    <p class="m-b-0">Facturas</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
                <div class="col-md-6 dashboard">
                    <div class="card" style="background:#65c8db ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-rss"></i></span>
                            </div>
                            <div class="media-body media-text-right">




                                <h2 class="color-white"><?php echo $countLowStock1; ?></h2>
                                <a href="brand.php">
                                    <p class="m-b-0">Proveedores</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>




        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Tabla de Facturas</strong>

                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Nombre Cliente</th>
                                    <th>Contacto</th>

                                    <th>Estado del Pago</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //include('./constant/connect');

                                $sql = "SELECT  uno, orderDate, clientName, clientContact,paymentStatus,id FROM orders WHERE delete_status = 0";
                                //echo $sql;exit;
                                $result = $connect->query($sql);
                                //print_r($result);exit;
                                foreach ($result as $row) {

                                    $no += 1;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?php echo $row['orderDate'] ?></td>
                                        <td><?php echo $row['clientName'] ?></td>
                                        <td><?php echo $row['clientContact'] ?></td>


                                        <td><?php if ($row['paymentStatus'] == 1) {

                                                $paymentStatus = "<label class='label label-info' ><h4>Pago Completo</h4></label>";
                                                echo $paymentStatus;
                                            } else if ($row['payment_status'] == 2) {
                                                $paymentStatus = "<label class='label label-warning'><h4>Pago Parcial</h4></label>";
                                                echo $paymentStatus;
                                            } else {
                                                $paymentStatus = "<label class='label label-danger'><h4>Pago Pendiente</h4></label>";
                                                echo $paymentStatus;
                                            } // /els
                                            ?></td>

                                    </tr>

                            </tbody>
                        <?php
                                }

                        ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <?php
        //error_reporting(0);
        //require_once('../constant/connect.php');
        $qqq = "SELECT * FROM product WHERE  status ='1' ";
        $result = $connect->query($qqq);
        //print_r($result);exit;
        foreach ($result as $row) {

            //print_r($row);
            $a .= $row["product_name"] . ',';
            $b .= $row["quantity"] . ',';
        }
        $am = explode(",", $a, -1);
        $amm = explode(",", $b, -1);
        //print_r($a);
        //print_r($b);

        $cnt = count($am);

        $datavalue1 = '';
        for ($i = 0; $i < $cnt; $i++) {
            $datavalue1 .= "['" . $am[$i] . "'," . $amm[$i] . "],";
        }
        //echo 

        $datavalue1; //used this $data variable in js
        ?>



    </div>
</div>
</div>


<?php include('./constant/layout/footer.php'); ?>
<script>
    $(function() {
        $(".preloader").fadeOut();
    })
</script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'], <?php echo $datavalue1; ?>
        ]);

        var options = {
            title: 'World Wide Wine Production',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

        var chart = new google.visualization.BarChart(document.getElementById('myChart1'));
        chart.draw(data, options);
    }
</script>


</div>