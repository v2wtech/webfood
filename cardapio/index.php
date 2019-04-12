<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    include '../database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");
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

</head>
<body>
    <div class="wrapper">
        <header id="header">
            <h2>Cardápio</h2>
        </header>

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
                <form action="#" method="POST" class="modal__content">

                    <a href="#" class="modal__close">&times;</a>

                    <input type="hidden" id="inIdProduct" value="">
                    <h2 id="inDescriptionProduct"></h2>
                    <p id="inPriceProduct"></p>
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
            
            loadModalProducts()

            loadProductsCategory()


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