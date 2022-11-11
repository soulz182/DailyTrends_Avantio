<!DOCTYPE html>
<html>

<head>

    <title>DailyTrends</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <?php
                include('functions.php');
                $id = null;
                if ( !empty($_GET['id'])) {
                    $id = $_REQUEST['id'];
                }

                if ( null==$id ) {
                    header("Location: index.php");
                } else {
                    $pdo = Database::connect();

                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM news where id_news = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($id));
                    $row = $q->fetch(PDO::FETCH_ASSOC);

                    Database::disconnect();
                }
        ?>

</head>

<body id="delete">

    <main class="container pb-4">
        <?php include("header.php");?>

        <div class=" py-4 mt-5">
            <h1 class="display-5">Eliminar noticia</h1>
            <p class="lead">Está a punto de eliminar la noticia: <b><?php echo $row['title']; ?></b>. <br>
                Esta acción no se puede deshacer. ¿Continuar?</p>
            <hr class="my-2">

            <form class="pt-4" action="functions.php" method="post" id="form-update" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        
                        
                        <button type="button" data-toggle="modal" data-target="#delete-modal" class="btn btnBorrar float-right">Eliminar</button>
                        
                        
                        <button type="reset" class="btn btnCrear float-right mr-3" onclick="history.back()">Cancelar</button>
                    </div>
                </div>

                <!-- Modal Borrar Noticia -->
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete-modal">¡Úlitmo aviso!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Una vez eliminado no se podrán recuperar los datos. ¿Desea continuar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btnCrear" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="button-delete" class="btn btnBorrar">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $row['id_news']?>" name="id_news-delete">

            </form>

        </div>

    </main>
	<?php include("footer.php");?>
   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>