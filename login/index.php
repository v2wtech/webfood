<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="../src/assets/icons/webfood.ico" />

    <title>WebFood - Estabelecimento</title>

    <!-- styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .wrapper {
            margin: 0;
            padding: 0;
            min-height: 100%;
            background: #777;
            background-image: url('../src/assets/bg01.jpg');
            background-attachment: fixed;
            background-position: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #wf-logo {
            width: 200px;
            height: 200px;
            margin-top: 25%;
            margin-bottom: 15%;
        }

        .btn-primary {
            margin-top: 10%;
            margin-bottom: 20%;
            width: 300px;
            height: 50px;
            color: #fff;
            font-size: 1em;
            border-radius: 0;
            font-weight: 700;
        }   

        input[type="text"], input[type="password"] {
            margin-bottom: 3%;
            width: 300px;
            height: 40px;
            font-size: 1em;
            padding: 10px;
        } 

        label[for="cbRememberMe"] {
            color:#fff;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col"></div>

                <div class="col d-flex justify-content-center">

                    <img src="../src/assets/webfood.png" alt="webfood" srcset="" id="wf-logo">
                </div>

                <div class="col"></div>
            </div>

            <form action="" method="POST">
                <div class="row">
                    <div class="col"></div>
        
                    <div class="col d-flex justify-content-center">
                        <input type="text" name="txtUsername" placeholder="Usuário" maxlength="30">
                    </div>
                    
                    <div class="col"></div>
                </div>

                <div class="row">
                    <div class="col"></div>

                    <div class="col d-flex justify-content-center">
                        <input type="password" name="txtPassword" placeholder="Senha" maxlength="30">
                    </div>

                    <div class="col"></div>
                </div>

                <div class="row">
                        <div class="col"></div>
    
                        <div class="col d-flex justify-content-center">
                           <label for="cbRememberMe">
                               <input type="checkbox" name="cbRememberMe" id="cbRememberMe">
                               Mantenha-me conectado
                           </label>
                        </div>
    
                        <div class="col"></div>
                    </div>

                <div class="row">
                    <div class="col"></div>

                    <div class="col d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="Entrar">
                    </div>

                    <div class="col"></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>