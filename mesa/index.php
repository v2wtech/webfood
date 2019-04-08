<?php 
    include '../database/database.php';

    $conn = new PDO("mysql:host=$server;dbname=$database;", "$user", "");

    $searchTables = $conn->prepare("SELECT idMesa, descricao, senha FROM mesa;");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../src/css/webfood.css">

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

        <h1>MESAS</h1>
    </nav>

    <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="index.php">Mesas</a>
        <a href="../cardapio/index.php">Cardápio</a>
    </div>


    <div class="mesas">
        <?php 
            if($searchTables->execute() > 0){
                while($table = $searchTables->fetch(PDO::FETCH_ASSOC)){
                    echo '<a href="#modal" class="mesa modal-open">' . $table["descricao"] . '</a>';
                }
            }   
        ?>
    </div>

    <div class="modal" id="modal">
        <form action="auth-mesa.php" method="POST" class="modal__content" name="EntraMesa">
            <a href="#" class="modal__close">&times;</a>
            <h2 class="modal__heading">autenticação</h2>
            <input type="text" name="txtDescription" id="mesa" value="---" style="background: #fff;cursor:context-menu;">
            <input type="password" name="txtPassword" id="senha" placeholder="Senha" autofocus>
            <input type="submit" name="btnSubmit" value="Entrar">
        </form>
    </div>

    <script>
        $(".modal-open").click(function () {
            var name = $(this).text();
            $("#mesa").val(name);
        });

        
        
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