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
      <div class="row">
        <div class="col div-registro">
          <h1>Actualizar sus datos: </h1>
          <label for="email">Nuevo correo electrónico:</label>
          <input type="text" placeholder="Ingrese nuevo correo electrónico">
          <label for="phone">Nuevo teléfono:</label>
          <input type="text" plasceholder="123456789">
          <label for="password">Contraseña actual:</label>
          <input type="text" placeholder="Escriba su contraseña">
          <label for="password">Nueva contraseña:</label>
          <input type="text" placeholder="Escoja una nueva contraseña">
            
          <input type="submit" value="Actualizar datos">
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

</style>