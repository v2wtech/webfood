<?php 
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        
        if(!isset($_SESSION['mesa']))
            header('Location: ../mesa/index.php');
    }

    include '../database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", $user, $password);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Webfood - Meu Pedido</title>

    <!-- styles  -->
    <link rel="stylesheet" href="../src/css/webfood.css">
    <style>
        input[type="button"]{
            width: 40px;
            height: 40px;
            background: transparent;
            font-size: 16pt;
            cursor: pointer;
            border: 1px solid #ccc;
            color: #ccc;
            outline: none;
            border-radius: 100px;
        }

        input[type="submit"] {
            margin: 5px auto;
            width: 200px;
            height: 50px;
            font-size: 1em;
            border: none;
            background: #1e72c5;
            color: #fff;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            background: #1a5b9c;
        }
        
        .btnMore:hover {
            color: #308a1e;
            border-color: #308a1e
        }

        .btnLess:hover {
            color: #d83333fc;
            border-color: #d83333fc;
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

            <h2>Meu Pedido</h2>
        </header>

        <div id="side-menu" class="side-nav">
            <a href="../cardapio/index.php">Cardápio</a>
            <a href="../pedido/index.php">Meu Pedido</a>
            <a href="../conta/index.php">Conta</a>
            <a href="../mesa/logout.php">Sair</a>
        </div>

        <main id="content">
            <form action="incluir.php" method="POST">
                <div class="order-row order-column">
                    <?php
                        foreach ($_SESSION['idProduto'] as $id) {
                            $amount = $_SESSION['quantidadeProduto'][$id];

                            $product = $conn->prepare("SELECT descricao, preco FROM produto WHERE idProduto = $id");
                            
                            $item = $product->fetch($product->execute() > 0);

                            echo '<div class="order_items" id="item-'. $id .'">';
                            echo   '<input type="hidden" name="txtItemId[]" value="'. $id .'">';
                            echo   '<input type="hidden" class="priceFix" value="' . $item['preco'] .'">';
                            echo   '<p class="textOrderItems descriptionOrderItems"><span>' . $item['descricao'] . '</span></p>';
                            echo   '<p class="textOrderItems priceOrderItems priceItem">R$ <span>' . $item['preco'] * $amount . '</span></p>';

                            echo   '<div class="amountOrderItems">';
                            echo        '<input type="button" class="btnLessMore btnLess" value="-" >';
                            echo        '<input name="txtAmountOrderItems[]" class="txtAmountOrderItems" value="' . $amount . '">';
                            echo        '<input type="button" class="btnLessMore btnMore" value="+" >';
                            echo   '</div>';
                                
                            echo   '<a href="excluir.php?id='. $id .'" class="textOrderItems cancelOrderItems">&times;</a>';
                            echo '</div>';
                            
                        }
                        
                    ?>
                </div>

                <div id="footer">
                    <input type="submit" id="btnEnviar" name="btnConfirmar" value="Confirmar">
                </div>
            </form>
        </main>
    </div>

    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {

            loadMenuOptions()

            loadOrderValue();

            updatePriceAmount();

            if($('.order_items') != null && $('.order_items').length > 4)        
                $('.order-row').classList.remove('order-column')

        }
    </script>
</body>

</html>