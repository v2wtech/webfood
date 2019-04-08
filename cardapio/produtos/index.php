<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../src/css/webfood.css">
    
    <title>Document</title>
</head>

<body>
    <nav class="navbar">
        <span class="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a>
        </span>

        <h1>CARDAPIO</h1>
    </nav>

    <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="../index.php">Cardápio</a>
    </div>


    <div class="itens">
        <div>
            <a href="#modal" class="item-pedido">item</a>
            <a href="#modal" class="item-pedido">item</a>
        </div>
        <div>
            <a href="#modal" class="item-pedido">item</a>
            <a href="#modal" class="item-pedido">item</a>
        </div>
        <div>
            <a href="#modal" class="item-pedido">item</a>
            <a href="#modal" class="item-pedido">item</a>
        </div>
        <div>
            <a href="#modal" class="item-pedido">item</a>
            <a href="#modal" class="item-pedido">item</a>
        </div>
    </div>

    <div class="modal" id="modal">
        <div class="modal__content">
            <a href="#" class="modal__close">&times;</a>
            <div class="itens">
                <label for="tamanho">tamanho</label>
                <input type="number" name="tamanho" id="tamanho" placeholder="tamanho">
            </div>
            <div class="itens">
                <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade" id="quantidade" placeholder="quantidade">
            </div>
            <div class="itens">
                <label for="sabores">sabores</label>
                <input type="text" name="sabores" id="sabores" placeholder="sabores">
            </div>
            <div class="itens">
                <label for="obs">observação</label>
                <input type="text" name="obs" id="obs" placeholder="observação">
            </div>


            <button type="submit" id="confirmar">Confirmar</button>
        </div>
    </div>


    <script>
        function openSlideMenu() {
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';
        }

        function closeSlideMenu() {
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('main').style.marginLeft = '0';
        }
    </script>
</body>


</html>