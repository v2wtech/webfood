<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();

    if(!isset($_SESSION['mesa']))
        header('location: ../mesa/index.php');

    if(!empty($_POST)){
        $id = $_POST["txtIdProduct"];
        $_SESSION['idProduto'][$id] = $id;
        $_SESSION['quantidadeProduto'][$id] = $_POST["txtAmount"];
        
        header('location: index.php');
    }
}

?>