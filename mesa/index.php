<?php
<<<<<<< HEAD
    // if(session_status() !== PHP_SESSION_ACTIVE){
    //     header('Location: ../carapio/index.php');
    // }

    include '../database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");
    $tables = $conn->prepare("SELECT descricao FROM mesa;");
=======

    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();

        if(isset($_SESSION['mesa']))
            header('Location: ../cardapio/index.php');
    }

    include '../database/database.php';
    $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");
    $tables = $conn->prepare("SELECT descricao FROM mesa;");
    
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
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

</head>
<body>
    <div class="wrapper">
        <header id="header">
            <h2>Mesas</h2>
        </header>

        <main id="content">
            <div class="tables">
                <?php
                    if($tables->execute() > 0)
                        while($table = $tables->fetch(PDO::FETCH_ASSOC)){
                            echo '<a href="#modal" class="table">' . $table["descricao"] . '</a>';
                        }
                    else
                        echo 'Não há mesas disponíveis.';
                ?>
            </div>

            <div class="modal" id="modal">
                <form action="auth.php" method="POST" class="modal__content">

                    <a href="#" class="modal__close">&times;</a>

                    <h2 class="modal__heading">Autenticação</h2>

                    <input type="text" name="txtDescription" id="inTable" value="---" style="background: #fff;cursor:context-menu;">
                    
                    <input type="password" name="txtPassword" id="inPassword" placeholder="Senha" autofocus>
                    
                    <input type="submit" name="btnSubmit" value="Entrar">
                </form>
            </div>
        </main>
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