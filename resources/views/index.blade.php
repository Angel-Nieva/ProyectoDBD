<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeliFeria</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
  <div class="wrapper">
    <div class="container-fluid">
        <img class="logo" src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" alt="Logo DeliFeria" >
      <div class="row">
        <div class="col div-login">
          <h1>Ingresar: </h1>
          <form>
            <label for="email">Correo electrónico</label>
            <input type="text" placeholder="Ingrese su correo electrónico:">
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingrese su contraseña:">
            <input type="submit" value="Ingresar">
          </form>
        </div>
        <div class="col div-registro">
          <h1>Registrarse: </h1>
          <label for="username">Nombre Completo:</label>
          <input type="text" placeholder="Ingrese su nombre">
          <label for="email">Correo electrónico:</label>
          <input type="text" placeholder="Ingrese su correo electrónico">
          <label for="rut">Rut:</label>
          <input type="text" placeholder="Ingrese su rut">
          <label for="phone">Teléfono:</label>
          <input type="text" placeholder="Ingrese un número de teléfono">
          <label for="password">Contraseña:</label>
          <input type="text" placeholder="Escoja una contraseña">
            <div class="form-check form-check-inline center">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Comprador
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                Feriante
              </label>
            </div>
          <input type="submit" value="Registrarse">
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
  font-family: noto-serif;
  }
.wrapper{
  padding:0;
  margin-right: 2%;
  margin-left: 2%;
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

input{
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