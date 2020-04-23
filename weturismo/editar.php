<?php



header('Content-Type: text/html; charset=utf-8');


$dsn = "mysql:dbname=weturismo;host=localhost";
$dbuser = "root";
$dbpass = "";



try {
    
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $dataNasc = $_POST['dataNasc'];
    $telefone = $_POST['telefone'];

    echo "$nome";


    if(isset($_POST['editar'])){
        $atualiza = "UPDATE clientes SET nome = :nome, dataNasc = :dataNasc, telefone = :telefone WHERE id = '$id' ";
        $atualiza = $pdo->prepare($atualiza);
        $atualiza->bindValue(':nome',$nome);
        $atualiza->bindValue(':dataNasc', $dataNasc);
        $atualiza->bindValue(':telefone', $telefone);
        $atualiza->execute();
        echo "<script> alert('Atualizado com Sucesso'); </script>";
        echo "<script> window.location = 'cadastro.php'; </script>";
    }elseif(isset($_POST['excluir'])){
        $delete = "DELETE FROM clientes WHERE id = '$id' ";
        $delete = $pdo->query($delete);
        echo "<script> alert('Excluído com Sucesso'); </script>";
        echo "<script> window.location = 'cadastro.php'; </script>";
    }    

} catch (PDOException $e) {
    
    echo ("Erro: " . $e->getMessage());

}

?>