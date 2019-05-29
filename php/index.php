<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Proyecto</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/fileinput.css">
        <link rel="stylesheet" type="text/css" href="../css/MiCss.css">
        <link rel="stylesheet" type="text/css" href="../css/MiCss2.css">
        <link rel="stylesheet" type="text/css" href="../css/botones.css">
        <link rel="stylesheet" type="text/css" href="../css/rangePrecio.css">

        <link rel="stylesheet" type="text/css" href="../smoke/smoke.css">

        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- BOOTSTRAP JAVASCRIPT -->
        <script src="../bootstrap/js/bootstrap.min.js" lenguage="javascript" type="text/javascript"></script>
        <script src="../js/index.js" lenguage="javascript" type="text/javascript"></script>

        <!-- MI JAVASCRIPT -->
        <script src="../js/jquery.session.js" lenguage="javascript" type="text/javascript"></script>
        <script src="../js/functions.js" lenguage="javascript" type="text/javascript"></script>
        <script src="../js/alerts.js" lenguage="javascript" type="text/javascript"></script>
        <script src="../js/ajax.js" lenguage="javascript" type="text/javascript"></script>
        <script src="../js/valoraciones.min.js" lenguage="javascript" type="text/javascript"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="../js/plugins/canvas-to-blob.js"></script>
        <script src="../js/fileinput.js"></script>

        <script src="../smoke/smoke.js"></script>
        <script src="../smoke/smoke.min.js"></script>
    </head>
    
    <body>

        <?php
        include 'masterPage/masterPageMenuSinLoginIndex.php';
        ?>

		<?php
		if($_GET['error']=='login'){
		?>
		<script>
		  smoke.alert("Error, el password y el correo no coinciden, intentalo de nuevo");
		</script>
		<?php
		}
		?>

         <?php
        include 'userNotLoggedIn/selectArticlesSinLogin.php';
        ?>

        <div id="content">
            <?php
            include 'userNotLoggedIn/resultadoBuscador.php';
            ?>
        </div>

        <?php
	    include 'masterPage/masterPageFooterBotonMasIndex.php';
	    ?>

    </body>
</html>