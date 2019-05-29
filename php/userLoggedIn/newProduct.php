<!-- /////// MODALS ////// -->

<!-- Modal producto -->
<div id="producto" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo producto</h4>
            </div>
            <div class="modal-body">
                <form action="uploadImages/uploadImagesProduct.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputNombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Nombre*" required>
                    </div>
                    <?php
                        $ciudad = select_ciudad_usuario($_SESSION['ID_USUARIO']);
                    ?>
                    <input type="hidden" name="ciudad" id="ciudad" class="form-control" value="<?php echo $ciudad ?>">
                    <div class="form-group">
                        <label for="exampleInputDescripcion">Descripcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control"  placeholder="Descripcion*" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTema">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control"  placeholder="Precio*" required>
                    </div>
                    <label for="exampleInputPrecio">Selecciona el tema</label></br>
                    <div class="form-group caja">
                        <?php $data = select_all_tema_producto(); ?>
                        <select name="tema" class="select_box" required>
                            <option value="" disabled selected>Selecciona el tema*</option>
                            <?php
                            if ($data->num_rows > 0) {
                                // output data of each row
                                while($row = $data->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['ID_CAT_PROD']?>"><?php echo "$row[tema]";?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="imagenesProducto" name="fileToUpload[]" type="file" multiple="multiple">
                        <script>
                            $("#imagenesProducto").fileinput({
                                uploadUrl: "/file-upload-batch/2",
                                autoReplace: true,
                                maxFileCount: 5,
                                allowedFileExtensions: ["jpg", "png", "gif"]
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal servicio -->
<div id="servicio" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo servicio</h4>
            </div>
            <div class="modal-body">
                <form action="uploadImages/uploadImagesService.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputNombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Nombre*" required>
                    </div>
                    <?php
                    $ciudad = select_ciudad_usuario($_SESSION['ID_USUARIO']);
                    ?>
                    <input type="hidden" name="ciudad" id="ciudad" class="form-control" value="<?php echo $ciudad ?>">
                    <div class="form-group">
                        <label for="exampleInputDescripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion*" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrecio">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control"  placeholder="Precio*" required>
                    </div>
                    <label for="exampleInputTema">Selecciona el tema</label></br>
                    <div class="form-group caja">

                        <?php $data = select_all_tema_servicio(); ?>
                        <select name="tema" class="select_box" required>
                            <option value="" disabled selected>Selecciona el tema*</option>
                            <?php
                            if ($data->num_rows > 0) {
                                // output data of each row
                                while($row = $data->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['ID_CAT_SERV']?>"><?php echo "$row[tema]";?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="imagenesServicio" name="fileToUpload[]" type="file" class="file-loading" accept="image/*" multiple="multiple">
                        <script>
                            $("#imagenesServicio").fileinput({
                                uploadUrl: "/file-upload-batch/2",
                                autoReplace: true,
                                maxFileCount: 3,
                                allowedFileExtensions: ["jpg", "png", "gif"]
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- ////// FIN MODALS ////// -->