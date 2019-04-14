<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Webfood - Mesas</title>

    <!-- styles  -->
    <link rel="stylesheet" href="../src/css/webfood.css">

</head>

<body>
    <div class="wrapper">
        <header id="header">
            <h2>Meu Pedido</h2>
        </header>

        <main id="content">
            <div class="pedido">
                <div class="item_pedido">
                    <span class="description">Pizza Frango</span>
                    <span class="price"> R$ 34.00</span>
                    <span class="x">
                        <strong>X</strong>
                    </span>
                    <span class="qntd"> 4 </span>
                    <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                </div>
                <div class="item_pedido">
                    <span class="description">Pizza Frango</span>
                    <span class="price"> R$ 34.00</span>
                    <span class="x">
                        <strong>X</strong>
                    </span>
                    <span class="qntd"> 4 </span>
                    <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                </div>
                <div class="item_pedido">
                    <span class="description">Pizza Frango</span>
                    <span class="price"> R$ 34.00</span>
                    <span class="x">
                        <strong>X</strong>
                    </span>
                    <span class="qntd"> 4 </span>
                    <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                </div>
                <div class="item_pedido">
                    <span class="description">Pizza Frango</span>
                    <span class="price"> R$ 34.00</span>
                    <span class="x">
                        <strong>X</strong>
                    </span>
                    <span class="qntd"> 4 </span>
                    <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                </div>
            </div>
            <div class="pedir">
                <hr>
                <span class="valor_pedido"> <strong>Valor</strong></span>
                <span class="total_pedido">total</span>
            </div>
        </main>

        <footer>
            <div>
                <input type="submit" id="btnEnviar" name="btnConfirmar" value="confirmar Pedido">
            </div>
        </footer>
    </div>

    <!-- scripts -->
    <script src="../src/js/webfood.js"></script>
    <script>
        window.onload = () => {
            loadFuncTables()
        }
    </script>
</body>

</html>