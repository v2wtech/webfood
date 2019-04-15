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

    <title>Webfood - Mesas</title>

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
            <h2>Meu Pedido</h2>
        </header>

        <main id="content">
            <form action="" method="POST">
                <div class="order">
                    <?php
                    $i = 0;
                    foreach ($_SESSION['quantidadeProduto'] as $qtde) {
                            $id = $_SESSION['idProduto'][$i];

                            $product = $conn->prepare("SELECT descricao, preco FROM produto WHERE idProduto = $id");
                            
                            $item = $product->fetch($product->execute() > 0);

                        
                            echo '<div class="order_items">';
                            echo   '<span class="textOrderItems descriptionOrderItems">' . $item['descricao'] . '</span>';
                            echo   '<span class="textOrderItems priceOrderItems">R$' . $item['preco'] . '</span>';

                            echo   '<div class="amountOrderItems">';
                            echo        '<input type="button" class="btnLessMore btnLess" value="-" >';
                            echo        '<span name="txtAmountOrderItems" class="txtAmountOrderItems">' . $qtde . '</span>';
                            echo        '<input type="button" class="btnLessMore btnMore" value="+" >';
                            echo   '</div>';
                                
                            echo   '<a href="" class="textOrderItems cancelOrderItems">&times;</a>';
                            echo '</div>';

                            $i++;
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
            $('.btnLess').forEach(btnLess => btnLess.onclick = (el) => {
                if(el.target.nextElementSibling.innerHTML > 1)
                el.target.nextElementSibling.innerHTML--
            })
            
            $('.btnMore').forEach(btnMore => btnMore.onclick = (em) => {
                em.target.previousElementSibling.innerHTML++
            })
        }
    </script>
</body>

</html>