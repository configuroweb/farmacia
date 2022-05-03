<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>

<?php include('./constant/connect');
$sql = "SELECT product_id, product_name,product_image,rate,quantity,brand_id,expdate,categories_id,active,status FROM product WHERE status = 1";
$result = $connect->query($sql);
//echo $sql;exit;

?>
<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> Gestionar Medicinas</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Gestionar Medicinas</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">




        <div class="card">
            <div class="card-body">

                <a href="add-product.php"><button class="btn btn-primary">Agregar Medicina</button></a>

                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th style="width:10%;">Foto</th>

                                <th>Nombre Medicina</th>
                                <th>Cant Por Unidad</th>
                                <th>Cantidad</th>
                                <th>Fabricante</th>
                                <th>Categoría</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {

                                $sql = "SELECT * from brands where brand_id='" . $row['brand_id'] . "'";
                                $result1 = $connect->query($sql);
                                $row1 = $result1->fetch_assoc();


                                $sql = "SELECT * from categories where categories_id='" . $row['categories_id'] . "'";
                                $result2 = $connect->query($sql);
                                $row2 = $result2->fetch_assoc();


                            ?>
                                <tr>


                                    <td class="text-center"><?php echo $row['product_id'] ?></td>
                                    <td><img src="assets/myimages/<?php echo $row['product_image']; ?>" style="width: 80px; height: 80px;"></td>


                                    <?php $d1 = date('Y-m-d');
                                    //echo $d1.$row['expdate'];exit;
                                    if ($row['expdate'] >= $d1) { //echo "abc1"; 
                                    ?>

                                        <td> <label class="label label-success"><?php echo $row['product_name']; ?></label></td>
                                    <?php  }
                                    if ($row['expdate'] < $d1) { //echo "abc"; 
                                    ?>
                                        <td><label class="label label-danger"><?php echo $row['product_name']; ?></label></td>

                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $row['rate'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row1['brand_name'] ?></td>
                                    <td><?php echo $row2['categories_name'] ?></td>
                                    <td><?php if ($row['active'] == 1) {

                                            $activeBrands = "<label class='label label-success' ><h4>Disponible</h4></label>";
                                            echo $activeBrands;
                                        } else {
                                            $activeBrands = "<label class='label label-danger'><h4>No disponible</h4></label>";
                                            echo $activeBrands;
                                        } ?></td>
                                    <td>

                                        <a href="editproduct.php?id=<?php echo $row['product_id'] ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>



                                        <a href="php_action/removeProduct.php?id=<?php echo $row['product_id'] ?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Deseas eliminar este registro?')"><i class="fa fa-trash"></i></button></a>


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