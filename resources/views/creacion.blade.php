<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeliFeria</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
        <h1>Creación de productos</h1>
        <form>
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" placeholder="Ingrese el nombre del producto">
            <label for="descripcion">Descripción</label>
            <input type="text" placeholder="Ingrese una descripción">
            <label for="precio">Precio</label>
            <input type="text" placeholder="Ingrese el precio">
            
            <label for="medida">Indique el tipo de medida:</label>
            <select name="medida" id="medida">
            <option value="kilo">Kilo</option>
            <option value="litro">Litro</option>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="text" placeholder="Ingrese la cantidad">
            <label for="stock">Stock actual</label>
            <input type="text" placeholder="Ingrese el stock">
            <label for="descuento">Descuento (0 si no hay descuento)</label>
            <input type="text" placeholder="Ingrese el descuento">
            <label for="tiempo">Duración del descuento en días (0 si no hay descuento)</label>
            <input type="text" placeholder="Ingrese la Duración">
            <input type="submit" value="Aceptar"><br>
        </form>
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
        width: 50%;
        margin-top: 1%;
    }
    #cuenta{
        margin-top: 1%;
        padding-left: 3%;
    }
    #salida{
        margin-top: 1%;
        padding-left: 50%;
    }
    .logo{
        height: 10%;
        width: 25%;
        display: block;
        margin-left: 110%;
        
    }
    a{
        color: black;
    }
    h1{
        text-align: center;
        font-weight: bold;
    }
    .row{
        background-color: #B5E48C;
    }
    label{
        margin-left: 15%;
        padding: 0;
        font-weight: bold;
        display:block;
        font-size: 20px;
    }
    select, input{
        margin-left: 15%;
        width: 60%;
        margin-bottom: 1%;
    }
    input[type="submit"] {
        border: none;
        outline: none;
        height: 4%;
        background: #117CF6;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        display:block;
    }

    .nav-link{
        border: solid;
        border-color: #52B69A;
        border-radius: 20px;
        background-color: #117CF6;
        color:white;
    } 

</style>
