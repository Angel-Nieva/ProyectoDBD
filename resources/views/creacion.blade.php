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
                    <li class="nav-item letra" id='ver_productos'>
                        <h2>
                            <form class='boton' action="{{action('MainController@ver_productos_view', ['id_usuario'=>$usuario])}}" method='GET'>
                            <input type="submit" value="Ver productos"></form>
                        </h2>
                    </li>
                    <li class="nav-item letra" id='creacion'>
                        <h2>
                            <form class='boton'action="{{action('MainController@crear_producto_view', ['id_usuario'=>$usuario])}}" method='POST'>
                            <input type="submit" value="Crear Producto"></form>
                        </h2>
                    </li>
                    <li class="nav-item letra" id="cuenta">
                        <h2>
                            <a class="nav-link" aria-current="page" href="v1.html">Cuenta</a>
                        </h2>
                    </li>
                    <li class="nav-item letra salir"  id="salida">
                        <h2>
                            <a class="nav-link" href='/'>Salir</a>
                        </h2>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container-fluid">
        <h1>Creación de productos</h1>
        @if (count($errors) > 0)
            <div class="alert-danger">
              <ul> 
                <li><p>Error en el ingreso de datos de producto</p></li>
              </ul>
            </div>
          @endif 
        <form action="{{action('MainController@crear_producto_action', ['id_usuario'=>$usuario])}}" method='POST'>
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" value="" name="nombre" placeholder="Ingrese el nombre del producto">
            <label for="descripcion">Descripción</label>
            <input type="text" value="" name="descripcion" placeholder="Ingrese una descripción">
            <label for="precio">Precio</label>
            <input type="text" value="" name="precio" placeholder="Ingrese el precio">
            
            <!--<label for="medida">Indique la unidad de medida (kilo o litro):</label>
            <input type="text" value="" name="tipo" placeholder="Ingrese la unidad de medida">-->
            
            <label for="medida">Indique el tipo de medida:</label>
            <select name="tipo" id="medida">
            <option value="kilo">Kilo</option>
            <option value="litro">Litro</option>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="text" value="" name="cantidad" placeholder="Ingrese la cantidad">

            <label for="stock">Stock actual</label>
            <input type="text" value="" name="stock" placeholder="Ingrese el stock">
            
            <label for="descuento">Descuento (0 si no hay descuento)</label>
            <input type="text" value="" name="descuento" placeholder="Ingrese el descuento">
            
            <label for="tiempo">Duración del descuento en días (0 si no hay descuento)</label>
            <input type="text" value="" name="tiempo" placeholder="Ingrese la Duración">
            
            <label for="categoria">Categoría del producto</label>
            <input type="text" value="" name="nombre_categoria" placeholder="Ingrese la categoría">
            
            <label for="descripcion_categoria">Descripción de la categoría</label>
            <input type="text" value="" name="descripcion_categoria" placeholder="Ingrese la descripción">
            
            <label for="subcategoria">Subcategoría del producto</label>
            <input type="text" value="" name="nombre_subcategoria" placeholder="Ingrese la subcategoría">
            
            <label for="descripcion_subcategoria">Descripción de la subcategoría</label>
            <input type="text" value="" name="descripcion_subcategoria" placeholder="Ingrese la descripción">
            
            @if(session()->has('mensaje'))
              <div class="alert alert-success">
                  {{ session()->get('mensaje') }}
              </div>
            @endif

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

    .logo {
        min-width: 120px;
        max-width: 140px;
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
    .boton{
        margin:10%;
        width:30vh;
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

</style>
