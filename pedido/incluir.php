<?php 

    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        
        if(!isset($_SESSION['mesa']))
            header('Location: ../mesa/index.php');

        if(!empty($_POST)){
            $i=0;
            foreach($_POST['txtItemId'] as $id){
                $_SESSION['quantidadeProduto'][$id] = $_POST["txtAmountOrderItems"][$i]; 
                $i++;
            }
        }
    }

    include '../Database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", $user, $password);

    if(isset($_SESSION['idPedido']) && !empty($_SESSION['idPedido'])){
        $idOrder = $_SESSION['idPedido'];

        inserePedido($idOrder, $conn);
    }
    else {
        $idTable = $_SESSION['idMesa'];
        $insertOrder = $conn->prepare("SELECT inserePedido($idTable) AS idPedido");
        $idOrder = $insertOrder->fetch($insertOrder->execute());
        
        $id = $_SESSION['idPedido'] = $idOrder['idPedido'];

        inserePedido($id, $conn);
    }
    

    function inserePedido($idOrder, $conn){
        foreach($_SESSION['idProduto'] as $idProduct){
            $amountProduct = $_SESSION['quantidadeProduto'][$idProduct];

            $insertItem = $conn->prepare("CALL insereItem($idOrder, $idProduct, $amountProduct)");
            $insertItem->execute();

            unset($_SESSION['idProduto'][$idProduct]);
            unset($_SESSION['quantidadeProduto'][$idProduct]);
        }

        header('Location: index.php');
    }



?>