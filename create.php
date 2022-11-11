<!DOCTYPE html>
<html>

<head>

    <title>DailyTrends</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    

</head>

<body id="create">

    <main class="container pb-4">
		
        <?php include("header.php");?>
		
		
		
        <div class="createForm">
            <h1 class="display-5">Nueva noticia</h1>
            <p class="lead">Rellene la información deseada para publicar una nueva noticia.</p>
            <hr class="my-2">

            <form action="functions.php" method="POST" id="form-create" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="new-title-input" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="new-title-input" name="title-create" placeholder="Título de la noticia" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-image-input" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" id="new-image-input" name="image-create">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-publisher-input" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="new-publisher-input" name="publisher-create" placeholder="Redactor del artículo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-source-input" class="col-sm-2 col-form-label">Periódico</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="new-source-input" name="source-create" placeholder="Periódico de la noticia">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-text-input" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <textarea rows="10" class="form-control" id="new-text-input" name="text-create" placeholder="Contenido de la noticia" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="reset" class="btn btnCrear float-right" onclick="history.back()">Cancelar</button>
                        <button type="submit" name="button-create" class="btn btnGreenCrear float-right mr-3">Publicar</button>
                    </div>
                </div>
            </form>
			

        </div>
		
		
    </main>

     <?php include("footer.php");?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>
