<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>


<?php include('./constant/connect.php');

$sql = "SELECT * from product where  product_id='" . $_GET['id'] . "'";
$result = $connect->query($sql)->fetch_assoc();
?>



<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Editar Medicina</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Editar Medicina</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">







        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div id="add-brand-messages"></div>
                    <div class="card-body">
                        <div class="input-states">
                            <form action="php_action/editProductImage.php?id=<?php echo $_GET['id']; ?>" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

                                <fieldset>
                                    <h1>Actualizar Foto</h1>
                                    <div class="changeUsenrameMessages"></div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Imagen Medicina</label>
                                            <div class="col-sm-9">

                                                <img src="assets/myimages/<?php echo $result['product_image'] ?>" style="width:250px; height:250px;">
                                                <input type="hidden" name="old_image" value="<?php echo $result['product_image'] ?>">




                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="editProductImage" class="col-sm-3 control-label">Selecciona Foto: </label>

                                            <div class="col-sm-9">

                                                <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                                <div class="kv-avatar center-block">
                                                    <input type="file" class="form-control" id="productImage" placeholder="Nombre Medicina" name="productImage" class="file-loading" style="width:auto;" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mx-auto">
                                        <button type="submit" name="btn" id="changeUsernameBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Guardar Cambios</button>
                                    </div>
                                </fieldset>


                            </form>
                            <form method="POST" id="submitProductForm" action="php_action/editProduct.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">

                                <fieldset>
                                    <h1>Medicina</h1>


                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nombre Medicina</label>
                                            <input type="text" class="form-control" id="editProductName" value="<?php echo $result['product_name'] ?>" name="editProductName" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Cantidad</label>
                                            <input type="text" class="form-control" id="editQuantity" value="<?php echo $result['quantity'] ?>" name="editQuantity" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Cantidad Por Unidad</label>
                                            <input type="text" class="form-control" id="editRate" value="<?php echo $result['rate'] ?>" name="editRate" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">PRM</label>
                                            <input type="text" class="form-control" id="mrp" placeholder="PRM" name="mrp" autocomplete="off" value="<?php echo $result['mrp'] ?>" required="" pattern="^[0-9]+$" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">No Lote</label>
                                            <input type="text" class="form-control" id="Batch No" placeholder="No Lote" name="bno" autocomplete="off" value="<?php echo $result['bno'] ?>" required="" pattern="^[Aa-Zz]+$" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Fecha de Vencimiento</label>
                                            <input type="date" class="form-control" id="expdate" placeholder="Fecha de Vencimiento" name="expdate" value="<?php echo $result['expdate'] ?>" autocomplete="off" required="" pattern="^[0-9]+$" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nombre Proveedor</label>
                                            <select id="editBrandName" name="editBrandName" required class="form-control">
                                                <?php
                                                $sql = ("SELECT * FROM brands  where brand_status=1 ");
                                                //echo $sql;exit;
                                                $results = mysqli_query($connect, $sql);
                                                //echo "23";exit;
                                                while ($rows = mysqli_fetch_assoc($results)) {
                                                    //echo $row['categories_name'];exit;
                                                ?>
                                                    <option value="<?php echo $rows['brand_id']; ?>" <?php if ($result['brand_id'] == $rows['brand_id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $rows['brand_name']; ?></option>";
                                                <?php   }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nombre Categoría</label>
                                            <select id="editCategoryName" name="editCategoryName" required class="form-control">
                                                <?php
                                                $sql = ("SELECT * FROM categories  where categories_status=1 ");
                                                //echo $sql;exit;
                                                $result1 = mysqli_query($connect, $sql);
                                                //echo "23";exit;
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    //echo $row['categories_name'];exit;
                                                ?>
                                                    <option value="<?php echo $row['categories_id']; ?>" <?php if ($result['categories_id'] == $row['categories_id']) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo $row['categories_name']; ?></option>";
                                                <?php   }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Estado</label>
                                            <select class="form-control" id="editProductStatus" name="editProductStatus">
                                                <option value="1" <?php
                                                                    if ($result['active'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Disponible</option>
                                                <option value="2" <?php if ($result['active'] == "2") {
                                                                        echo "selected";
                                                                    } ?>>No disponible</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mx-auto text-center">
                                            <button type="submit" name="create" id="createCategoriesBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Actualizar</button>
                                        </div>

                                </fieldset>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>





        <?php include('./constant/layout/footer.php'); ?>


        <script src="custom/js/product.js"></script>