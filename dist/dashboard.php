
<?php include 'header.php';

if(Session::exists('home')) {
    echo "<div id='alert' class='alert-success text-center'>" . "<strong>" .  Session::flash('home') . "</strong>" . "</div>";
}

?>
<section id="home-slider">
    <div class="container">
        <div class="row">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Bem Vindo Ao Sistema de Gerenciamento Guttenberg</h1>
                    <p>Sistema de Informação e Armazenamento.</p>
                </div>
                <img src="images/slider/hill.png" class="slider-hill" alt="imagem slider">
                <img src="images/slider/house.png" class="slider-house" alt="imagem slider">
                <img src="images/slider/sun.png" class="slider-sun" alt="imagem slider">
                <img src="images/slider/birds1.png" class="slider-birds1" alt="imagem slider">
                <img src="images/slider/birds2.png" class="slider-birds2" alt="imagem slider">
            </div>
        </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="images/control.png" alt="icone 1">
                    </div>
                    <h2>Controle</h2>
                    <p>A adoção de um sistema de controle reduz a necessidade de controles manuais, o que faz com que o fluxo de informação seja contínuo, além de aumentar a produtividade da equipe. Permite aos usuários criar, editar, atualizar, armazenar e recuperar dados em questões de segundos.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                        <img src="images/eficiency.png" alt="icone 2">
                    </div>
                    <h2>Precisão</h2>
                    <p>Dados precisos e consistentes são um sinal de integridade dos dados. SGBDs fomentam a integridade dos dados, porque as atualizações e alterações dos dados só tem que ser feitas em um só lugar.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                        <img src="images/security.png" alt="icone 3">
                    </div>
                    <h2>Segurança</h2>
                    <p>Os bancos de dados são utilizados para armazenar diversos tipos de informações, desde dados sobre uma conta de e-mail até dados importantes da Receita Federal. A segurança do banco de dados herda as mesmas dificuldades que a segurança da informação enfrenta, que é garantir a integridade, a disponibilidade e a confidencialidade. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- In Progress
<section id="action" class="responsive">
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title">Triangle Corporate Template</h1>
                        <p>A responsive, retina-ready &amp; wide multipurpose template.</p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="tour-button">
                            <a href="#" class="btn btn-common">Mais...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<script type="text/javascript">
    setTimeout(function () {
        $("#alert").fadeOut();
    }, 2000);
</script>

<?php include 'footer.php';?>