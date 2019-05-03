<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();

        if(!isset($_SESSION['mesa']))
            header('location: ../mesa/index.php');
    }

    include '../database/database.php';

    $conn = new PDO("mysql:host=$server;dbname=$database;", $user, $password);
    $categories = $conn->prepare("SELECT idCategoria, descricao FROM categoria;");
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="../src/assets/icons/webfood.ico" />

    <title>Webfood - Cardápio</title>

    <!-- styles  -->
    <link rel="stylesheet" href="../src/css/webfood.css">
    
    <style>
        .category {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 50%;
            color: #fff;
            filter: grayscale(75%);
            transition: .2s all;    
            text-shadow: 1px 1px 3px #000; 
        }

        .category:hover{
            filter: grayscale(5%);
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

            <h2>Cardápio</h2>
        </header>

        <div id="side-menu" class="side-nav">
            <a href="../cardapio/index.php">Cardápio</a>
            <a href="../pedido/index.php">Meu Pedido</a>
            <a href="../conta/index.php">Conta</a>
            <a href="../mesa/logout.php">Sair</a>
        </div>

        <main id="content">
            <div class="categories">
                    <?php
                        if($categories->execute() > 0)
                            while($category = $categories->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="categoryProducts">';
                                    echo '<div class="category">' . $category["descricao"] . '</div>';
                                    echo '<div class="products-open products-close">';

                                        $categoryId = $category["idCategoria"];
                                        $products = $conn->prepare("SELECT idProduto, descricao, preco FROM produto WHERE idCategoria = $categoryId");
                                        
                                        if($products->execute() > 0)
                                            while($product = $products->fetch(PDO::FETCH_ASSOC)){
                                                echo '<a href="#modal" class="product">';
                                                echo '<input type="hidden" class="idProduct" value="'.$product["idProduto"].'">';
                                                echo '<img src="../src/assets/produtos/teste.png" class="imageProduct">';
                                                echo '<span class="descriptionProduct">'.$product["descricao"].'</span>';
                                                echo '<span class="priceProduct"> R$ '.$product["preco"].'</span>';
                                                echo '</a>';
                                            }
                                    echo '</div>';
                                echo '</div>';
                            }
                    ?> 
            </div>
        </main>
        
        <div class="modal" id="modal">
                <form action="pedido.php" method="POST" class="modal__content">

                    <a href="#" class="modal__close">&times;</a>

                    <input type="hidden" name="txtIdProduct" id="inIdProduct" value="">
                    <h2 name="txtDescriptionProduct" id="inDescriptionProduct"></h2>
                    <p name="txtPriceProduct" id="inPriceProduct"></p>
                    <div>
                        <input type="button" class="btnLessMore" id="btnLess" value="-" >
                        <input type="text" name="txtAmount" id="inAmount" value="1">
                        <input type="button" class="btnLessMore" id="btnMore" value="+" >
                    </div>

                    <input type="submit" id="btnAddOrder" name="btnSubmit" value="Adicionar ao Pedido">
                </form>
            </div>
    </div>
    
    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {
            loadMenuOptions() 

            loadModalProducts()

            loadProductsCategory()

            loadImagesCardapio();

            $('#btnLess').addEventListener('click', function(){
                lessProduct();
            });

            $('#btnMore').addEventListener('click', function(){
                moreProduct();
            });


            

            

            

        }
    </script>
</body>
</html>