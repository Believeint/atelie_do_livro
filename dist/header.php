<?php require_once "Core/init.php"; ?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema Gerenciador | Guttenberg">
    <meta name="author" content="">
    <title>Sistema | Guttenberg</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/main2.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/ajax.js"></script>
</head>
<body>

    <header id="header">
       <div class="container">
           <div class="row">
               <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                       <ul class="nav nav-pills">
                           <li><a href=""><i class="fa fa-facebook"></i></a></li>
                           <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                           <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                           <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
        <div class="navbar navbar-inverse role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="dashboard.php">
                        <h1><img src="images/logo_livro_mini.png">GUTTENBERG</h1>
                    </a>
            </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php"><i class="fa fa-plus-circle"></i> Nova Entrada</a></li>
                        <li class="dropdown">
                            <a href="#">Cadastro<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="cad_cliente_view.php">Cliente Direto</a></li>
                                <li><a href="cad_cliente_indireto_view.php">Cliente Indireto</a></li>
                                <li><a href="cad_agenda_view.php">Agenda</a></li>
                                <li><a href="#">Em breve</a></li>
                                <li><a href="#">Em Breve</a></li>
                                <li><a href="#">Em Breve</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="blog.php">Pesquisa<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="pes_cliente_view.php">Cliente Direto</a></li>
                                <li><a href="pes_cliente_indireto_view.php">Cliente Indireto</a></li>
                                <li><a href="pes_agenda_view.php">Agenda</a></li>
                                <li><a href="#">Em Breve</a></li>
                                <li><a href="#">Em Breve</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Em Breve</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>



