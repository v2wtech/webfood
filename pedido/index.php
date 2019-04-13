<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Webfood - Meu Pedido</title>

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
                    <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                </div>
                <div class="item_pedido">
                        <span class="description">Pizza Frango</span>
                        <span class="price"> R$ 34.00</span>
                        <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                    </div>
                    <div class="item_pedido">
                            <span class="description">Pizza Frango</span>
                            <span class="price"> R$ 34.00</span>
                            <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                        </div>
                        <div class="item_pedido">
                                <span class="description">Pizza Frango</span>
                                <span class="price"> R$ 34.00</span>
                                <input type="button" class="btnExcluir" id="btnExcluir" value="Excluir">
                            </div>
            </div>
            <div class="pedir">
                <input type="submit" id="btnEnviar" name="btnConfirmar" value="confirmarPedido">
            </div>
        </main>

        <footer>
            <span class="valor_pedido">
                <h2 class="valor_pedido">Valor</h2>
            </span>
            <span class="total_pedido">
                <h1 class="total_pedido"></h1>
            </span>
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