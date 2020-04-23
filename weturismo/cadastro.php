<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WE Turismo</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
        window.onload = function () {
            document.querySelector(".menuMobile").addEventListener("click", function () {
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
    <?php

        $dsn = "mysql:dbname=weturismo;host=localhost";
        $dbuser = "root";
        $pass = "";

        try {
          $pdo = new PDO($dsn, $dbuser, $pass);

          if(isset($_POST['nome']) && !empty($_POST['nome'])){
            if(isset($_POST['dataNasc']) && !empty($_POST['dataNasc'])){
              if(isset($_POST['telefone']) && !empty($_POST['telefone'])){

                $nome = $_POST['nome'];
                $dataNasc = $_POST['dataNasc'];
                $telefone = $_POST['telefone'];

                $cadastro = "INSERT INTO clientes SET nome = :nome, dataNasc = :dataNasc, telefone = :telefone ";
                $cadastro= $pdo->prepare($cadastro);

                $cadastro->bindValue(':nome', $nome);
                $cadastro->bindValue(':dataNasc', $dataNasc);
                $cadastro->bindValue(':telefone', $telefone);
                $cadastro->execute();

                echo "<script> alert('Cadastro Realizado com Sucesso. Você será direcionado para a página de pagamento.'); </script>";
                echo "<script> window.location = 'https://pagamento.gerencianet.com.br/botao-de-pagamento/fea6e118-a4c2-43f3-8f0d-a2344e49b96f'; </script>";

              }
            }
          }

          $consulta = "SELECT * FROM clientes";
          $consulta = $pdo->query($consulta);

          if($consulta->rowCount()>0){

            echo "<form action='editar.php' method='post' class=''>";

            foreach ($consulta->fetchAll() as $cliente) {
              
              echo    "<div class='form-group formularioflex' >";
              echo      " <input type='hidden' class='form-control' id='exampleInputEmail1' name='id' required value='$cliente[id]'> ";
              echo      " <input type='text' class='form-control' id='exampleInputEmail1' name='nome' required value='$cliente[nome]'> ";
              echo      " <input type='date' class='form-control' id='exampleInputEmail1' name='dataNasc' required value='$cliente[dataNasc]'> ";
              echo      " <input type='text' class='form-control' id='exampleInputEmail1' name='telefone' required value='$cliente[telefone]'> ";
              echo      "<button name='editar' class='btn btn-primary'> EDITAR </button>";
              echo      "<button name='excluir' class='btn btn-primary'>EXCLUIR</button>";
              echo    "</div>";    
             

            }
            echo "</form>";

          }

        } catch (\Throwable $th) {
          
        }

    ?>

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
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.972855955401!2d-44.79487618572715!3d-4.225553196928155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9b003a3f8b4b27de!2sWE%20turismo!5e0!3m2!1spt-BR!2sbr!4v1571100840004!5m2!1spt-BR!2sbr"
          width="224" height="224" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
    <div class="direitos-autorais">
      <span> &copy; Copyright 2019 - Todos os Direitos Reservados - Desenvolvido por André Santos </span>
    </div>
  </footer>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
</body>

</html>



