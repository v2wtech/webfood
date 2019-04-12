<?php
    include '../database/database.php';

    if(!empty($_POST)){
        
        $description = $_POST['txtDescription'];
        $password = $_POST['txtPassword'];
        
        try{
            $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");

            $tables = $conn->prepare("SELECT idMesa, senha FROM mesa WHERE descricao = '$description';");
            
            $table = $tables->fetch($tables->execute());

            if($password == $table["senha"]){
                if(session_status() !== PHP_SESSION_ACTIVE){
                    session_start();
                    $_SESSION['idMesa'] = $table['idMesa'];
                    $_SESSION['mesa'] = $description;
                    $_SESSION['idProduto'] = array();
                    $_SESSION['quantidadeProduto'] = array();
                    header('Location: ../cardapio/index.php');
                }
            }
            else{
                header('Location:index.php');
            }
        }
        catch(PDOException $err){
            echo 'Error: ' . $err->getMessage();
        }
    }
?>