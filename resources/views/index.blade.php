<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeliFeria login</title>
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <a href="login.html"><img src="delif1.png" class="logo" alt="logo sitio"></a>
      <div class="row">
        <div class="col div-login">
          <h1>Ingrese</h1>
          <form>
            <label for="email">Correo electrónico</label>
            <input type="text" placeholder="Ingrese su correo electrónico">
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingrese su contraseña">
            <input type="submit" value="Ingresar">
          </form>
        </div>
        <div class="col div-registro">
          <h1>Registrese</h1>
          <label for="username">Nombre Completo</label>
          <input type="text" placeholder="Ingrese su nombre">
          <label for="email">Correo electrónico</label>
          <input type="text" placeholder="Ingrese su correo electrónico">
          <label for="rut">Rut</label>
          <input type="text" placeholder="Ingrese su rut">
          <label for="phone">Teléfono</label>
          <input type="text" placeholder="Ingrese un número de teléfono">
          <label for="password">Rut</label>
          <input type="text" placeholder="Escoja una contraseña">

          <div class="checkbox">  
            <h4>Roles</h4>
            <div class="checks"><label for="comprador">Comprador</label></div>
            <div class="checks"><input type="checkbox" id="comprador"></div>
          </div>
          <div class="checkbox">  
            <div class="checks"><label for="feriante">feriante</label></div>
            <div class="checks"><input type="checkbox" id="feriante"></div>
          </div>

          <input type="submit" value="Registrarse">
        </div>
      </div>
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
  padding: 0;
  margin-right: 2%;
  margin-left: 2%;
  margin-top: 2%;
  margin-bottom: 2%;
  height: 90%;
  overflow:auto;
  
  background-color: #B5E48C;
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

.checkbox .checks{
  display:inline;
}
input, label{
  font-size: 20px;
}
</style>