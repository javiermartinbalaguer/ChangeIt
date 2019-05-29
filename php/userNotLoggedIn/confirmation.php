<!DOCTYPE html>
<html>
<head>

    <title>Proyecto</title>
    <meta charset="UTF-8">

    <?php
    include '../masterPage/masterPageHeader.php';
    ?>

</head>
<body>

<div style="display:inline-block; margin-left:40%;" class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Confirmación del registro</h4>
    </div>
    <div class="modal-body">
    <form action="../main.php?tipo=confirmar" method="POST">

        <div class="form-group">
            <label for="exampleInputEmail2">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control"  placeholder="Correo">
        </div>

        <div class="form-group">
            <label for="exampleInputName222">Código de Confirmación</label>
            <input type="text" name="confirmacion" id="confirmacion" class="form-control"  placeholder="Confirmacion">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary"  Value="Registrarse" >Enviar</button>
        </div>
    </form>
</div>

</body>
</html>