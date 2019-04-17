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

    <title>Webfood - Minha Conta</title>

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
        

        .consumido{
            left:45%;
            position:relative;
        }
        
        .valor_total {
            display: flex;
            font-size: 12pt;
            height: auto;
            align-items: center;
            margin-bottom: 4%;
        }
    
        .valor {
            margin-left: 8%;
            width: 45%;
            font-weight: 500;
            margin-bottom: 4%;
        }
    
        .valorFix {
            margin: 0;
            padding: 0;
            display: flex;
            flex-flow: row;
            align-items: center;
            width: 100%;
            height: 100px;
            border-top: 1px solid #999;
            background-color:#d83333fc;
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

            <h2>Minha Conta</h2>
        </header>

        <div id="side-menu" class="side-nav">
            <a href="../cardapio/index.php">Cardápio</a>
            <a href="../pedido/index.php">Meu Pedido</a>
            <a href="../conta/index.php">Conta</a>
            <a href="../mesa/logout.php">Sair</a>
        </div>
        
        <main id="content">    
            <form action="" method="POST">
                
                <div class="order-row">
                <h1 class="consumido"><strong>Consumido</strong></h1>
                    <?php
                        $total = 0;
                        foreach ($_SESSION['idProduto'] as $id) {
                            $qtde = $_SESSION['quantidadeProduto'][$id];
                            
                            $product = $conn->prepare("SELECT descricao, preco FROM produto WHERE idProduto = $id");
                            
                            $item = $product->fetch($product->execute() > 0);
                          
                            $total += $item['preco'] * $qtde;
                        
                            if($id != 0){
                               
                                echo '<div class="order_items">';
                                echo   '<span class="textOrderItems descriptionOrderItems">' . $item['descricao'] . '</span>';
                                echo   '<span class="textOrderItems priceOrderItems"> preço  R$ ' . $item['preco'] . '</span>';
                               
                                echo   '<div class="amountOrderItems">';
                                echo        '<span name="txtAmountOrderItems" class="txtAmountOrderItems"> qtd  ' . $qtde . '</span>';
                                echo   '</div>';
                                    
                                echo '</div>';
                            }
                       
                        }
                        
                    ?>
                    

                </div>

                <div id="footer">
                <div class="valorFix">
                        <span class="valor"> Valor Total</span>
                        <span class="valor_total" id="valorTotal">R$ <?php echo $total?></span>   
                    </div>
                </div>
            </form>
        </main>
    </div>

    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {

            loadMenuOptions()

            if($('.order_items') != null && $('.btnLess') != null){
                if($('.btnLess').length > 0)
                    loadAddNFunctions()
                else
                    loadAddFunctions()
            
                if($('.order_items').length > 4)
                    $('.order-row').classList.remove('order-column')
            }
        }
    </script>
</body>

</html>