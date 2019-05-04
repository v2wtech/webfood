<?php 
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        
        if(!isset($_SESSION['mesa']))
            header('Location: ../mesa/index.php');

        if(!isset($_SESSION['idPedido']) || empty($_SESSION['idPedido']))
            header('Location: ../cardapio/index.php');
    }

    include '../Database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", $user, $password);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Webfood - Minha Conta</title>

    <!-- styles  -->
    <link rel="stylesheet" href="../src/css/webfood.css">
    <style>
        .txtAmountOrderItems {
            color: #000;
            font-size: 14pt;
            font-weight: 600;
        }
   </style>
</head>

<body>
    <div class="wrapper">

        <header id="header">
            <input id="menu-hamburguer" type="checkbox">

            <label for="menu-hamburguer">
                <div class="menu">
                    <span class="hamburguer"></span>
                </div>
            </label>

            <h2>Conta</h2>
        </header>

        <div id="side-menu" class="side-nav">
            <a href="../cardapio/index.php">Cardápio</a>
            <a href="../pedido/index.php">Meu Pedido</a>
            <a href="../conta/index.php">Conta</a>
            <a href="../mesa/logout.php">Sair</a>
        </div>
        
        <main id="content">    
                <div class="order-row order-column">
                    <?php
                        echo '<div class="order_items">';
                        echo   '<p class="textOrderItems descriptionOrderItems"><span> Produto </span></p>';
                        echo   '<p class="textOrderItems descriptionOrderItems"><span> Quantidade </span></p>';
                        echo   '<p class="textOrderItems descriptionOrderItems"><span> Valor </span></p>';
                        echo '</div>';
                         $idOrder = $_SESSION['idPedido'];

                         $itemsOrder = $conn->prepare("CALL consultaConta($idOrder)");

                         if($itemsOrder->execute() > 0)
                             while($item = $itemsOrder->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="order_items">';
                                echo   '<p class="textOrderItems descriptionOrderItems"><span>' . $item['descricao'] . '</span></p>';
                                echo   '<p class="textOrderItems descriptionOrderItems "><span>' . $item['quantidade'] . '</span></p>';
                                echo   '<p class="textOrderItems descriptionOrderItems">R$ <span class="txtPriceProduct">' . $item['preco'] . '</span></p>';
                                echo '</div>';
                            }
                        
                    ?>
                    
                </div>

                <div id="footer">
                    <p class="textOrderItems descriptionOrderItems"><span> Valor Total:  </span></p>
                    <p class="textOrderItems descriptionOrderItems txtTotalValue"> R$ <span> </span></p>
                    <p class="textOrderItems descriptionOrderItems"><span> </span></p>
                </div>
        </main>
    </div>

    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {

            loadMenuOptions()
            
            loadTotalValue()

            
            if($('.order_items') != null && $('.order_items').length > 4)        
                $('.order-row').classList.remove('order-column')

        }
    </script>
</body>

</html>