<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();

    if(!isset($_SESSION['mesa']))
        header('location: ../mesa/index.php');

    if(!empty($_POST)){
        $_SESSION['idProduto'][] = $_POST["txtIdProduct"];
        $_SESSION['quantidadeProduto'][] = $_POST["txtAmount"];    
        header('location: index.php');
    }
}

echo '<br><br><br>';
echo '<a href="../mesa/logout.php"> Logout </a>';

?>