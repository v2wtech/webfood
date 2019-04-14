<?php
<<<<<<< HEAD
=======

>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
    include '../database/database.php';

    if(!empty($_POST)){
        
        $description = $_POST['txtDescription'];
        $password = $_POST['txtPassword'];
        
        try{
            $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");

<<<<<<< HEAD
            $tables = $conn->prepare("SELECT senha FROM mesa WHERE descricao = '$description';");
=======
            $tables = $conn->prepare("SELECT idMesa, senha FROM mesa WHERE descricao = '$description';");
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
            
            $table = $tables->fetch($tables->execute());

            if($password == $table["senha"]){
<<<<<<< HEAD
                
                if(session_status() !== PHP_SESSION_ACTIVE){
                    session_start();
                    $_SESSION['mesa'] = $description;
                }

                header('Location: ../cardapio/index.php');
=======
                if(session_status() !== PHP_SESSION_ACTIVE){
                    session_start();
                    $_SESSION['idMesa'] = $table['idMesa'];
                    $_SESSION['mesa'] = $description;
                    $_SESSION['idProduto'] = array();
                    $_SESSION['quantidadeProduto'] = array();
                    header('Location: ../cardapio/index.php');
                }
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
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