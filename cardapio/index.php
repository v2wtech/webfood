<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
<<<<<<< HEAD
=======

        if(!isset($_SESSION['mesa']))
            header('location: ../mesa/index.php');
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
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

    <title>Webfood - Cardápio</title>

    <!-- styles  -->
    <link rel="stylesheet" href="../src/css/webfood.css">

</head>
<body>
    <div class="wrapper">
        <header id="header">
<<<<<<< HEAD
            <h2>Cardápio</h2>
=======
            <h2>Cardápio | <a href="pedido.php">Pedido</a></h2> 
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
        </header>

        <main id="content">
            <div class="categories">
                    <?php
                        if($categories->execute() > 0)
                            while($category = $categories->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="categoryProducts">';
<<<<<<< HEAD
                                    echo '<div class="category" id="' . $category["descricao"] . '">' . $category["descricao"] . '</div>';
                                    echo '<div class="products">';

                                        $categoryId = $category["idCategoria"];
                                        $products = $conn->prepare("SELECT descricao,preco FROM produto WHERE idCategoria = $categoryId");
=======
                                    echo '<div class="category">' . $category["descricao"] . '</div>';
                                    echo '<div class="products-open products-close">';

                                        $categoryId = $category["idCategoria"];
                                        $products = $conn->prepare("SELECT idProduto, descricao, preco FROM produto WHERE idCategoria = $categoryId");
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
                                        
                                        if($products->execute() > 0)
                                            while($product = $products->fetch(PDO::FETCH_ASSOC)){
                                                echo '<a href="#modal" class="product">';
<<<<<<< HEAD
=======
                                                echo '<input type="hidden" class="idProduct" value="'.$product["idProduto"].'">';
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
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
<<<<<<< HEAD

           
        </main>

        <div class="modal" id="modal">
                <form action="#" method="POST" class="modal__content">

                    <a href="#" class="modal__close">&times;</a>

                    <!-- <img id="inImageProduct" src=""> -->
=======
        </main>
        
        <div class="modal" id="modal">
                <form action="pedido.php" method="POST" class="modal__content">

                    <a href="#" class="modal__close">&times;</a>

                    <input type="hidden" name="txtIdProduct" id="inIdProduct" value="">
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
                    <h2 id="inDescriptionProduct"></h2>
                    <p id="inPriceProduct"></p>
                    <div>
                        <input type="button" class="btnLessMore" id="btnLess" value="-" >
<<<<<<< HEAD
                        <input type="text" name="txtAmount" id="inAmount" value="1" style="background: #fff;cursor:context-menu;">
=======
                        <input type="text" name="txtAmount" id="inAmount" value="1">
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
                        <input type="button" class="btnLessMore" id="btnMore" value="+" >
                    </div>

                    <input type="submit" id="btnAddOrder" name="btnSubmit" value="Adicionar ao Pedido">
                </form>
            </div>
    </div>
<<<<<<< HEAD

=======
    
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {
<<<<<<< HEAD
            loadModalProducts()

=======
            
            loadModalProducts()

            loadProductsCategory()

>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
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