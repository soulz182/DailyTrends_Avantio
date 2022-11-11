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

<body id="read">

    <main class="container pb-4">
        <?php include("header.php");?>
        
        <div class="row pt-4">
            <div class="col-12 pb-2"><?php echo "<h1>".$row['title']."</h1>"; ?></div>
        </div>
        
        <div class="row align-items-center ">
            <div class="col-6"><span class="articleDetails"><?php echo "<small>".$row['source']." | ".$row['publisher']."</small>"; ?></span></div>
            <div class="col-6">
                <a href="delete.php?id=<?php echo $row['id_news']?>" class="btn btnBorrar">Eliminar</a>
                <a href="update.php?id=<?php echo $row['id_news']?>" class="btn btnEditar">Editar</a>
            </div>
        </div>
        
        <hr>

        <div class="row pt-4">
            <div class="col-md-12 col-lg-12">
                <div class="col-12 pb-4"><?php echo "<img src='".$row['image']."' style='width:100%;'>"; ?></div>
                <div class="col-12"><?php echo "<p>".$row['text']."</p>"; ?></div>
            </div>
           
        </div>
        
        
    </main>

    <?php include("footer.php");?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>