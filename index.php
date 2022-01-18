<?php
    session_start();
    
    require_once __DIR__ . '/flash.php';
    require_once __DIR__ . '/prever.php';
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

        <!-- Bootstrap core CSS -->
        <link href="view/css/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="view/css/bootstrap-4.0.0/docs/4.0/examples/cover/cover.css" rel="stylesheet">

        <title>Machine Learning PHP</title>
    </head>

    <body>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
            <h3 class="masthead-brand">PHP-ML</h3>
            <nav class="nav nav-masthead justify-content-center">
                <!-- <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#sob">Sobre</a>
                <a class="nav-link" href="#app">Aplicação</a> -->
            </nav>
            </div>
        </header>
        
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Machine Learning (ML) com PHP</h1>
            <!-- <p class="lead">Aplicação de modelos de ML para previsão de preços de ativos financeiros</p> -->
            <!--
                <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary">Learn more</a> 
            </p>-->

            <section id="sob">
                <div class="sobre-parent">
                    <div class="sobre 1">
                        <h2>Sobre esse projeto</h2>
                        <p class="lead"> Esse projeto foi desevolvido para a matéria Programação para Internet 2 do IFB (2ª SEM/2021). </p>
                        <p class="lead"> O objetivo desse projeto é criar uma aplicação WEB que utilize conceitos de Aprendizado de Máquinas (Machine Learning). </p>
                        <p class="lead"> O projeto foi desenvolvido por João Paulo Pires Dantas <a href="https://twitter.com//joaopaulolopd">@joaopaulolopd</a>. </p> 
                    </div>                                            
                    <div class="sobre 2">
                        <h3>Como funciona a aplicação</h3>
                        <!-- <p class="lead"> Fa </p>                        
                        <p class="lead"> A partir disso cria vários modelos de ML capazes de prever o preço desse ativo. </p>
                        <p class="lead"> Por fim, apresenta os dados de acurácia da previsão realizada. </p>
                        <p class="lead"> Executar os seguintes passos para usar a aplicação: </p> -->
                        <ol>
                            <li class="lead">Realizar upload do arquivo .csv com o seguinte cabeçalho e dados: valor mínimo, valor máximo, volume, cotação do dia. </li>
                            <li class="lead">Faça o upload do arquivo e observe os dados dos modelos.</li>
                        </ol>  
                    </div>

                </div>                
            </section>

            <section id="app">           
                <form enctype="multipart/form-data" action="upload.php" method="post">
                    <div>
                        <label for="file" class="lead">Faça o upload do arquivo </label>
                        <input type="file" id="file" name="file" accept="text/csv, text/plain"/>
                    </div>
                    <div>
                    </br>
                    <button type="submit" class="btn btn-lg btn-primary">modelar!</button>
                    </div>
                </form>      
                             

                <!-- <?php  echo "1 " .$_SESSION["uploadPath"]. "</br>"; ?> -->

                <?php 
                    flash('upload');  
         
                    if( isset( $_SESSION["uploadPath"] ) && !empty( $_SESSION["uploadPath"] ) && $_SESSION["uploadPath"] !== "/"   )
                    {
                        echo modelarDados( $_SESSION["uploadPath"] );

                        session_unset($_SESSION["uploadPath"]);

                        session_destroy();

                    }
                ?>
            </section>

            <!-- <section></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></section> -->


        </main>

        

        <footer class="mastfoot mt-auto">
            <div class="inner">
            <p>Template adaptado por <a href="https://twitter.com//joaopaulolopd">@joaopaulolopd</a>, desenvolvido por <a href="https://twitter.com/mdo">@mdo</a> e feito com o <a href="https://getbootstrap.com/">Bootstrap</a>.</p>
            </div>
        </footer>

    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="view/css/bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="view/css/bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="view/css/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
    
    </html>


