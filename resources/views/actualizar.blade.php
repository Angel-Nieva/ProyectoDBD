<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeliFeria</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
  <link rel="stylesheet" href="estilo.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital@1&display=swap" rel="stylesheet">   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg">        
    <div class="container">
              <a class="navbar-brand" href="{{action('UsuarioController@show', $usuario->id)}}"> <img src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" class="logo2"
                    alt="logo sitio"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <ion-icon name="menu-sharp"></ion-icon>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item letra salir"  id="salida">
                          <h2>
                              <a class="nav-link" href="/">Salir</a>
                          </h2>
                      </li>
                  </ul>
              </div>
      </div>
  </nav>  
  <div class="wrapper">
    <div class="container-fluid">
        <img class="logo" src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" alt="Logo DeliFeria" >
      <div class="row">
        <div class="col div-registro">
        <form action="{{action('UsuarioController@update', $usuario->id)}}" method='GET'>
          <h1>Actualizar sus datos: </h1>
          <label for="email">Nuevo correo electrónico:</label>
          <input type="text" placeholder="Ingrese nuevo correo electrónico">
          <label for="phone">Nuevo teléfono:</label>
          <input type="text" plasceholder="123456789">
          <label for="password">Contraseña actual:</label>
          <input type="text" placeholder="Escriba su contraseña">
          <label for="password">Nueva contraseña:</label>
          <input type="text" placeholder="Escoja una nueva contraseña">
            
          <input type="submit" class="btn btn-primary" value="Actualizar datos">
        </form>
        </div>
      </div> 
    <div> 
  </div> 
</body>
</html>

<style>

body{
  background-color: #52B69A;
  height: auto;
  font-family: 'Zilla Slab', serif;
  }
.wrapper{
  padding:0;
  margin-right: 25%;
  margin-left: 25%;
  margin-top: 2%;
  margin-bottom: 2%;
  min-height: 91vh;
  overflow:auto;
  background-color: #B5E48C;
}
.logo{
  width:20%;
  height:10%;
  margin-left:auto;
  margin-right:auto;
}
.logo2 {
        min-width: 120px;
        max-width: 140px;
    }
.row{
  height: 60vh;
}
.logo{
  height: 8%;
  width: 15%;
  display: block; 
  margin-left: auto;
  margin-right: auto;
}
.div-registro{
  padding-left: 2%;
  width: 45%;
  height: 60%;
  margin-left: auto;
  margin-right: auto;
}
h1,h4{
  text-align: center;
  font-weight: bold;
}
label {
  margin-left: 15%;
  padding: 0;
  font-weight: bold;
  display: block;
}

input{
  margin-left: 15%;
  width: 70%;
  margin-bottom: 2%;
}

input[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  background: #117CF6;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
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