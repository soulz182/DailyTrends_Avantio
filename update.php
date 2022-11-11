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

<body id="update">

    <main class="container pb-4">
        <?php include("header.php");?>

        <div class="">
            <h1 class="display-5">Editar noticia</h1>
            <p class="lead">Para terminar de editar la noticia, por favor haga click en el botón "Guardar".</p>
            <hr class="my-2">

            <form action="functions.php" method="post" id="form-update" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="news-title-input" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="news-title-input" name="title-update" value="<?php echo $row['title']?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="news-image-input" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" id="news-image-input" name="image-update">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="news-publisher-input" class="col-sm-2 col-form-label">Fuente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="news-publisher-input" name="publisher-update" value="<?php echo $row['publisher']?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="news-source-input" class="col-sm-2 col-form-label">Periódico</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="news-source-input" name="source-update" value="<?php echo $row['source']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="news-text-input" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <textarea rows="10" class="form-control" id="news-text-input" name="text-update" placeholder="Contenido de la noticia" required><?php echo $row['text']?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="reset" class="btn btnCrear float-right" onclick="history.back()">Cancelar</button>
                        <button type="submit" name="button-update" class="btn btnGreenCrear float-right mr-3">Guardar</button>
                    </div>
                </div>
                
                
                <input type="hidden" value="<?php echo $row['id_news']?>" name="id_news-update">
                
            </form>
            
        </div>
		
		
		

    </main>

    <?php include("footer.php");?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>