<!DOCTYPE html>
<html>

<head>

    <title>DailyTrends</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php 
        include("functions.php");
        include("DOM/simple_html_dom.php");
    ?>

</head>

<body id="index">

    <main class="container pb-4">
        <?php include("header.php");?>
        <?php include("menu.php");?>
      
        <!-- EL MUNDO -->
        <div id="elmundo" class="sectionTitle row pt-4">
            <div class="col-12">
                <h2 class="newspaperTitle">El Mundo</h2>
            </div>
        </div>
        
        <?php
         
        $html = file_get_html('https://www.elmundo.es');
        $news_content = $html->find('div[class=ue-c-cover-content__body]');
        $i = 1;

        foreach(array_slice($news_content,0) as $news_res) {
           
        $article_title = $news_res->find("a[class=ue-c-cover-content__link]",0);
        $article_publisher = $news_res->find(".ue-c-cover-content__byline-name", 0);
        $article_source = $news_res->find(".ue-c-cover-content__byline-location", 0);
            
        $html_img = file_get_html($article_title->href);
        $article_image = $news_res->find("div.ue-c-cover-content__media figure picture img",0);
            
            
            if($i>0 && $i<=5) {
                
                
                                    
                                
            
                if($article_image==null){
                     echo '
                    <div class="articleContainer pt-4 row">
                        <div class="col-3"><a href="'.$article_title->href.'"><img src="img/elmundo_logo.jpg" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        <div class="col-9 articleTitle"><a href="'.$article_title->href.'"><h2>'.$article_title.'</h2></a></div>
                        <p></p>
                        <div class="pt-4 col-12">
                        <div class="articleDetails"><b>EL MUNDO</b> |<span><span class="hidden-content"> Redacción: </span>'.$article_publisher->outertext.'</span></div>
                    </div>
                    </div>
                        '
                    ;
                   

                } else {
                    echo '
                    <div class="articleContainer pt-4 row">
                        <div class="col-3"><a href="'.$article_title->href.'"><img src="'.$article_image->src.'" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        <div class="col-9 articleTitle"><a href="'.$article_title->href.'"><h2>'.$article_title.'</h2></a></div>
                        <p></p>
                        <div class="pt-4 col-12">
                        <div class="articleDetails"><b>EL MUNDO</b> |<span><span class="hidden-content"> Redacción: </span>'.$article_publisher->outertext.'</span></div>
                    </div>
                    </div>
                        '
                    ;
                     
                }
                
                $i++;
                
            } else {
                break;
            }
            
            
        }
            
        $html->clear();
        unset($html);
        $html_img->clear();
        unset($html_img);
        
        
        ?>
        
      
        
        
        
        
        
          <!-- EL PAIS -->
        <div id="elpais" class="sectionTitle row pt-4">
            <div class="col-12">
                <h2 class="newspaperTitle">El País</h2>
            </div>
        </div>
        
        
        
        <?php
        
        $html2 = file_get_html('https://elpais.com/');
        $news_content2 = $html2->find('.c-d');
        $i2 = 1;

        foreach($news_content2 as $news_res2) {
        
        $article_title2 = $news_res2->find("h2[class=c_t]",0);
        $article_link2 = $news_res2->find("h2[class=c_t] a",0);
        $article_publisher2 = $news_res2->find(".c_a_a",0);
        $article_src = $news_res2->find("p[class=c_d]",0);
        $article_image2 = $news_res2->find("div.b-d_b article figure a img",0);
            
            if($i2<=5){
                if(($article_link2)==null)
                {
                    
                    $i2--;
                    
                } else if($article_image2==null) {
                    
                    echo  '
                    <div class="articleContainer pt-4 row">
                        <div class="col-3"><a href="https://elpais.com'.$article_link2->href.'"><img src="img/elpais_logo.png" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        <div class="col-9 articleTitle"><h2><a href="https://elpais.com'.$article_link2->href.'">'.$article_title2->plaintext.'</a></h2></div>
                        <p></p>
                        <div class="pt-4 col-12">
                        <div class="articleDetails"><b>EL MUNDO</b> |<span><span class="hidden-content"> Redacción: </span>'.$article_publisher2.'</span></div>
                    </div>
                    </div>
                        '
                    ;
                    
                    
                    
                }
                
                
                else {
                    
                    echo '
                    <div class="articleContainer pt-4 row">
                        <div class="col-3"><a href="https://elpais.com'.$article_link2->href.'"><img src="'.$article_image2->src.'" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        <div class="col-9 articleTitle"><h2><a href="https://elpais.com'.$article_link2->href.'">'.$article_title2->plaintext.'</a></h2></div>
                        <p></p>
                        <div class="pt-4 col-12">
                        <div class="articleDetails"><b>EL MUNDO</b> |<span><span class="hidden-content"> Redacción: </span>'.$article_publisher2.'</span></div>
                    </div>
                    </div>
                        '
                    ;
                    
                    
                    
                }
                
                $i2++;
                
                
            } else {
                break;
            }
            
        }
        
        
        ?>
        
           <!-- NOTICIAS CUSTOM -->
        <div id="masnoticias" class="sectionTitle row pt-4">
            <div class="col-12">
                <h2 class="newspaperTitle">Más Noticias</h2>
				<a href="create.php" class="btn btnCrear">Nueva Noticia</a>
            </div>
        </div>
        
        
		<?php

                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM news ORDER BY id_news DESC';
    
    

                    foreach ($pdo->query($sql) as $row) {
                        $text = strlen($row['text']) > 250 ? substr($row['text'],0,250)."..." : $row['text'];
                        
                        if($row['image']==null){
                            
                           
							
							echo  '
                    			<div class="articleContainer pt-4 row">
                        			<div class="col-3"><a href="read.php?id='.$row['id_news'].'"><img src="img/elpais_logo.png" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        			<div class="col-9 articleTitle"><h2><a href="read.php?id='.$row['id_news'].'">'.$row['title'].'</a></h2></div>
                        			<p></p>
                        			<div class="pt-4 col-12">
                        				<div class="articleDetails"><b>'.$row['source'].'</b> |<span><span class="hidden-content"> Redacción: </span>'.$row['publisher'].'</span></div>
									</div>
                    			</div>
                        '
                    ;
                            
                        } else {
                            
                            echo  '
                    			<div class="articleContainer pt-4 row">
                        			<div class="col-3"><a href="read.php?id='.$row['id_news'].'"><img src="'.$row['image'].'" style="width:100%;" alt="Imagen noticia"></a></div>
                                            
                        			<div class="col-9 articleTitle"><h2><a href="read.php?id='.$row['id_news'].'">'.$row['title'].'</a></h2></div>
                        			<p></p>
                        			<div class="pt-4 col-12">
                        				<div class="articleDetails"><b>'.$row['source'].'</b> |<span><span class="hidden-content"> Redacción: </span>'.$row['publisher'].'</span></div>
									</div>
                    			</div>
                        '
                            ;
                            
                        }
                            
                        
                            
                        }

                    Database::disconnect();
                    
                    ?>
        
       
        
    </main>
    
     <?php include("footer.php");?>

  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>