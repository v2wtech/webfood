<?php 
    
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        
        if(!isset($_SESSION['mesa']))
            header('Location: ../mesa/index.php');
    }

    if(!empty($_GET)){
        $id = $_GET['id'];

        unset($_SESSION['idProduto'][$id]);
        unset($_SESSION['quantidadeProduto'][$id]);

        header('Location: index.php');
    }

?>