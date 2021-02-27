<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>DeliFeria</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
</head>
<body>
    <div class="row">
        <ul class="nav navStyle">
            <li class="nav-item letra" id="cuenta">
                <h2>
                    <a class="nav-link" aria-current="page" href="v1.html">Cuenta</a>
                </h2>
            </li>
            <li class="nav-item letra" id="logo">
                <h2>
                    <a href="login.html"><img src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" class="logo" alt="logo sitio"></a>
                </h2>
            </li>
            <li class="nav-item letra salir"  id="salida">
                <h2>
                    <a class="nav-link" href="#">Salir</a>
                </h2>
            </li>
          </ul>
    </div>  
    <div class="container-fluid">
        <h1>Lista de productos</h1>
    </div>
</body>
</html>

<style>
    body{
        background-color: #52B69A;
        height: auto;
        font-family: noto-serif;
    }
    .container-fluid {
        background-color: #B5E48C;
        width: 80%;
        margin-top: 1%;
    }
    .nav-link{
        border: solid;
        border-color: #52B69A;
        border-radius: 20px;
        background-color: #117CF6;
        color:white;
    }
    .logo{
        height: 10%;
        width: 25%;
        display: block;
        margin-left: 110%;
    }
    #cuenta{
        margin-top: 1%;
        padding-left: 3%;
    }
    #salida{
        margin-top: 1%;
        padding-left: 50%;
    }
    .row{
        background-color: #B5E48C;
    }
    h1{
        text-align: center;
    }
</style>