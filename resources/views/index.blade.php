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
<body class="container-fluid">
    
  <div class="wrapper">
    <div class="container-fluid">
        <img class="logo" src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" alt="Logo DeliFeria" >
        @if (count($errors) > 0)
          <div class="alert-danger">
            <ul> 
              <li><p>Error en el ingreso de datos</p></li>
            </ul>
          </div>
        @endif 
      <div class="row">
        <div class="col div-login">
          <h1>Ingresar: </h1>
          <form  action="{{route('checkLogin')}}" method="POST">
            <label for="email">Correo electrónico:</label>
            <input type="text" value="" name="email" placeholder="Ingrese su correo electrónico">
            <label for="contraseña">Contraseña:</label>
            <input type="password" value="" name="contraseña" placeholder="Ingrese su contraseña">
            <input type="submit" class="btn btn-primary" value="Ingresar">
          </form>
        </div>
        <div class="col div-registro">
          <h1>Registrarse: </h1>
          <form action="{{route('registro')}}" method="POST">
            <label for="username">Nombre Completo:</label>
            <input type="text" value="" name="nombre" placeholder="Ingrese su nombre">
            
            <label for="email">Correo electrónico:</label>
            <input type="text" value="" name="email" placeholder="Ingrese su correo electrónico">
            
            <label for="rut">Rut (sin puntos y con guión):</label>
            <input type="text" value="" name="rut" placeholder="Ingrese su rut">
            
            <label for="comuna">Comuna</label>
            <input type="text" value="" name="comuna" placeholder="Ingrese su comuna">

            <label for="calle">Calle</label>
            <input type="text" value="" name="calle" placeholder="Ingrese la calle">

            <label for="numero">Número</label>
            <input type="text" value="" name="numero" placeholder="Ingrese el número de su dirección">
            
            <label for="phone">Teléfono:</label>
            <input type="text" value="" name="telefono" placeholder="Ingrese un número de teléfono">
            
            <label for="password">Contraseña:</label>
            <input type="password" value="" name="contraseña" placeholder="Escoja una contraseña">
            <label for="nombre_rol">Escoja un rol:</label>
            <select display="block" value= "" name="nombre_rol" id="nombre_rol">
            <option value="Cliente">Cliente</option>
            <option value="Feriante">Feriante</option>
            </select>
            @if(session()->has('mensaje'))
              <div class="alert alert-success">
                  {{ session()->get('mensaje') }}
              </div>
            @endif
            <input type="submit" class="btn btn-primary" value="Registrarse">
          </form>
        </div>
      </div> 
    </div> 
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
  margin-right: 2%;
  margin-left: 2%;
  margin-top: 2%;
  margin-bottom: 2%;
  min-height: 140vh;
  overflow:auto;
  background-color: #B5E48C;
}
.alert-danger{
  text-align: center;
}
.row{
  height: 60vh;
}
.logo{
  height: 8%;
  width: 16%;
  display: block; 
  margin-left: auto;
  margin-right: auto;
}
.div-login{
  padding-left: 2%;
  width: 45%;
  height: 60%;
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

input, select{
  margin-left: 15%;
  width: 70%;
  margin-bottom: 2%;
}

input[type="checkbox"]{
  margin:0;
  padding:0;
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

.form-check{
  margin-left:20%;
  margin-right:auto;
}


</style>