<!-- Modal imagen servicio 1 -->
<div id="cambiarImagenServicio1" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageService.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idServicio = $_GET['id'];
                        ?>

                        <input id="imagenServicio1" name="fileToUpload[0]" type="file">
                        <input type="hidden" name="idService" value="<?php echo $idServicio ?>">
                        <script>
                            $("#imagenServicio1").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen servicio 2 -->
<div id="cambiarImagenServicio2" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageService.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idServicio = $_GET['id'];
                        ?>

                        <input id="imagenServicio2" name="fileToUpload[1]" type="file">
                        <input type="hidden" name="idService" value="<?php echo $idServicio ?>">
                        <script>
                            $("#imagenServicio2").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen servicio 3 -->
<div id="cambiarImagenServicio3" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageService.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idServicio = $_GET['id'];
                        ?>

                        <input id="imagenServicio3" name="fileToUpload[2]" type="file">
                        <input type="hidden" name="idService" value="<?php echo $idServicio ?>">
                        <script>
                            $("#imagenServicio3").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen producto 1 -->
<div id="cambiarImagenProducto1" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageProduct.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idProducto = $_GET['id'];
                        ?>

                        <input id="imagenProducto1" name="fileToUpload[0]" type="file">
                        <input type="hidden" name="idProduct" value="<?php echo $idProducto ?>">
                        <script>
                            $("#imagenProducto1").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen producto 2 -->
<div id="cambiarImagenProducto2" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageProduct.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idProducto = $_GET['id'];
                        ?>

                        <input id="imagenProducto2" name="fileToUpload[1]" type="file">
                        <input type="hidden" name="idProduct" value="<?php echo $idProducto ?>">
                        <script>
                            $("#imagenProducto2").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen producto 3 -->
<div id="cambiarImagenProducto3" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageProduct.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idProducto = $_GET['id'];
                        ?>

                        <input id="imagenProducto3" name="fileToUpload[2]" type="file">
                        <input type="hidden" name="idProduct" value="<?php echo $idProducto ?>">
                        <script>
                            $("#imagenProducto3").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen producto 4 -->
<div id="cambiarImagenProducto4" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageProduct.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idProducto = $_GET['id'];
                        ?>

                        <input id="imagenProducto4" name="fileToUpload[3]" type="file">
                        <input type="hidden" name="idProduct" value="<?php echo $idProducto ?>">
                        <script>
                            $("#imagenProducto4").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal imagen producto 5 -->
<div id="cambiarImagenProducto5" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar imagen del servicio</h4>
            </div>
            <center>
                <div class="modal-body">

                    <form action="uploadImages/changeImageProduct.php" method="post" enctype="multipart/form-data">

                        <?php
                        $idProducto = $_GET['id'];
                        ?>

                        <input id="imagenProducto5" name="fileToUpload[4]" type="file">
                        <input type="hidden" name="idProduct" value="<?php echo $idProducto ?>">
                        <script>
                            $("#imagenProducto5").fileinput({
                                uploadUrl: true,
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 200,
                                maxFileCount: 1,
                                initialPreviewShowUpload: false,
                                showUpload: false,
                                autoReplace: true,
                                resizeImage: true,
                                browseClass: "btn btn-primary btn-block",
                                showCaption: false,
                                uploadAsync: true,
                                showRemove: false
                            });
                        </script>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                        </div>

                    </form>
                </div>
            </center>
        </div>
    </div>
</div>