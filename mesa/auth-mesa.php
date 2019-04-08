<?php
    include '../database/database.php';

    if(!empty($_POST)){

        $descriptionTable = $_POST["txtDescription"];
        $passwordTable = $_POST["txtPassword"];
        
        try {
            $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");

            $searchTable = $conn->prepare("SELECT senha FROM mesa WHERE descricao = '$descriptionTable'");
            
            $table = $searchTable->fetch($searchTable->execute());

            if($passwordTable == $table["senha"]){
                header('Location: ../cardapio/index.php');
            }
            else{
                header('Location: index.php');
                exit;
            }
           

            

        }
        catch(PDOException $err){
            echo 'Error: ' . $err->getMessage();
        }
        
        
        
        
    }





?>