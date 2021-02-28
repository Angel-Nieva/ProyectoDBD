<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital@1&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg">        
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" class="logo"
                    alt="logo sitio"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <ion-icon name="menu-sharp"></ion-icon>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item letra" id="cuenta">
                        <h2>
                            <a class="nav-link" aria-current="page" href="v1.html">Cuenta</a>
                        </h2>
                    </li>
                    <li class="nav-item letra salir"  id="salida">
                        <h2>
                            <a class="nav-link" href="#">Salir</a>
                        </h2>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER-->    
    <header class="main-header">
        <div class="background-overlay text-white py-5">
            <div class="container">
                <div class="row">
                    <form>
                        <label for="nombre">Nombre:</label>
                        <input type="text" placeholder="#">
                        <label for="rol">Rol:</label>
                        <input type="text" placeholder="#">
                        <label for="rut">Rut:</label>
                        <input type="text" placeholder="#">            
                        <label for="email">Email:</label>
                        <input type="text" placeholder="#"> 
                        <label for="cantidad">Cantidad:</label>
                        <input type="text" placeholder="#">
                        <label for="reputacion">Reputacion:</label>
                        <input type="text" placeholder="#">
            
                    </form>
                </div>
            </div>
        </div>
    </header>  
  
</body>
  

</html>

<style>

    .main-header {
        position: relative;
        background: url(https://www.teahub.io/photos/full/296-2969665_fondo-frutas-y-verduras-hd.jpg);
        background-size: cover;
        background-position: center bottom;
        min-height: 600px;
        font-family: 'Zilla Slab', serif;
    }
    
    .background-overlay {
        position:absolute;
        background:rgba(22, 160, 133,.6);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .navbar-toggler { font-size: 40px;}
    .navbar-toggler:focus { outline:none}
    .nav-link{
        border: solid;
        border-color: #52B69A;
        border-radius: 20px;
        background-color: #117CF6;
        color:white;
    }

    .nav-link:hover {
        color: #1a1a1a
    }

    .navbar {
        background-color: #B5E48C;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .05);
        min-height: 100px;
    }

    .logo {
        min-width: 120px;
        max-width: 140px;
    }

    label{
        margin-left: 15%;
        padding: 0;
        font-weight: bold;
        display:block;
        font-size: 20px;
        color:rgb(0, 0, 0);
    }

    input{
        margin-left: 15%;
        width: 60%;
        margin-bottom: 1%;
    }
     
</style>