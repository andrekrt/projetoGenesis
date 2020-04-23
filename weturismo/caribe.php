<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php?erro=1');
    echo "Não iniciado";
}

require_once('conexao.php');
$idUsuario = $_SESSION['id'];
$nomeUsuario = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WE Turismo</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
        window.onload = function() {
            document.querySelector(".menuMobile").addEventListener("click", function() {
                if (document.querySelector(".menu nav ul").style.display == 'flex') {
                    document.querySelector(".menu nav ul").style.display = 'none';
                    document.getElementById("secao").style.marginTop = '0px'

                } else {
                    document.querySelector(".menu nav ul").style.display = 'flex';
                    document.getElementById("secao").style.marginTop = '110px'
                }
            });
        };
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
</head>

<body>
    <header class="container-base">
        <div class="cabecalho" id="inicio">
            <a href="index.html">
                <div class="logo">
                    <img src="imagens/logoWE.png" alt="">
                </div>
            </a>
            <div class="menu">
                <nav>
                    <div class="menuMobile">
                        <div class="mm_line"></div>
                        <div class="mm_line"></div>
                        <div class="mm_line"></div>
                    </div>
                    <ul>
                        <li><a href="index.html"> <img src="imagens/icones/home.png" alt=""> INÍCIO </a></li>
                        <li><a href="index.html#proximas-viagens"> <img src="imagens/icones/proximas-viagens.png" alt=""> PRÓXIMAS
                                VIAGENS </a></li>
                        <li><a href="index.html#ultimas-viagens"> <img src="imagens/icones/proximas-viagens.png" alt=""> ÚLTIMAS VIAGENS </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="container-base">
        <table border="1" width="100%">
            <tr>
                <th>NOME</th>
                <th>TELEFONE:</th>
                <th>PAGO</th>
            </tr>
            <?php
            
                $sql = "SELECT * FROM caribe";
                $sql = $pdo->query($sql);
                if($sql->rowCount()>0){
                    foreach($sql->fetchAll() as $clientes){
                        echo '<tr>';
                        echo '<td>' . $clientes['nome'] . '</td>';
                        echo '<td>' . $clientes['telefone'] . '</td>';
                        echo '<td>' . $clientes['Pago'] . '</td>';
                        echo '</tr>';
                    }
                }else{
                    echo "Nenhum cliente encontrado na base de dados atual";
                }
            
            ?>
        </table>
    </section>
    <footer class="container-base">
        <div class="rodape">
            <div class="logo-rodape">
                <img src="imagens/logoWE.png" alt="">
            </div>
            <div class="area-rede-sociais">
                <div class="rede-sociais">
                    <a href="https://www.instagram.com/weturismo/" target="__blank">
                        <img src="imagens/icones/instagram.png" alt="">
                        <span> weturismo </span>
                    </a>
                </div>
                <div class="rede-sociais">
                    <a href="https://www.facebook.com/elizabeth.mendes.7311?fref=search&__tn__=%2Cd%2CP-R&eid=ARAB1fyE_wSBxPsJBij2nluzjvWlJX824de9JnUVN3v1S0vrk_uL4tT7JMUENYjscitAV4n4M1fob973" target="__blank">
                        <img src="imagens/icones/facebook.png" alt="">
                        <span> WETur </span>
                    </a>
                </div>
                <div class="rede-sociais">
                    <a href="https://whats.link/weturismo" target="__blank">
                        <img src="imagens/icones/whatsapp.png" alt="">
                        <span> (99) 98161-7395 </span>
                    </a>
                </div>
                <div class="endereco">
                    <span>Avenida Cohab, número 34 <br> Cohab I, Bacabal - MA, 65700-000</span>
                </div>
            </div>
            <div class="area-localizacao">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.972855955401!2d-44.79487618572715!3d-4.225553196928155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9b003a3f8b4b27de!2sWE%20turismo!5e0!3m2!1spt-BR!2sbr!4v1571100840004!5m2!1spt-BR!2sbr" width="224" height="224" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
        <div class="direitos-autorais">
            <span> &copy; Copyright 2019 - Todos os Direitos Reservados - Desenvolvido por André Santos </span>
        </div>
    </footer>
</body>

</html>