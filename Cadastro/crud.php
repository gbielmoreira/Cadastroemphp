<?php

function getConexao(){

    $dsn="mysql:host=localhost;dbname=bd_app;charset=utf8";
    $user="root";
    $pass="";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch (PDOException $e) {
        echo "erro banco: ".$e->getMessage();   
    }
    catch (Exception $e) {
        echo "erro generico: ".$e->getMessage();
    }
}

function insertDB($nome_aplicativo, $tamanho, $data_instalacao, $versao){
    $conn = getConexao();
    $sql = "INSERT INTO tb_aplicativo(nome_aplicativo, tamanho, data_instalacao, versao)
    VALUES (:nome_aplicativo,:tamanho,:data_instalacao,:versao)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nome_aplicativo",$nome_aplicativo);
    $stmt->bindParam(":tamanho",$tamanho);
    $stmt->bindParam(":data_instalacao",$data_instalacao);
    $stmt->bindParam(":versao",$versao);
    if ($stmt->execute()) {
        echo "<center><strong>SALVO COM SUCESSO</strong></center>";
    }
    else {
        echo "DEU RUIM! =/";
    }
}
    insertDB($_POST['nome_aplicativo'], $_POST['tamanho'], $_POST['data_instalacao'], $_POST['versao'],);


?>