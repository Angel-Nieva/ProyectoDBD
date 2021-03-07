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
        <img class="logo" src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" alt="Logo DeliFeria" >
        <div class="container mt-5 mb-5 d-flex justify-content-center">
          <div class="card p-5">
              <div>
                  <h4 class="heading">Pago de su carrito</h4>
                  <p class="text">Proceda con su compra para que pueda recibir sus productos</p>
              </div>
              <div class="pricing p-3 rounded mt-4 d-flex justify-content-between">
                  <div class="images d-flex flex-row align-items-center"> <img src="app/resources/views/imagenes/carrito.png" class="rounded" width="60">
                      <div class="d-flex flex-column ml-4"> <span class="business">Carro de compras</span> <span class="plan">ENVIO POR PAGAR</span> </div>
                  </div>
                  <!--pricing table-->
                  <div class="d-flex flex-row align-items-center"> <sup class="dollar font-weight-bold">$</sup> <span class="amount ml-1 mr-1">27500 CLP</span>  </div> <!-- /pricing table-->
              </div> <span class="detail mt-5">Escoja una de sus tarjetas</span>
              <div class="credit rounded mt-4 d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/qHX7vY1.png" class="rounded" width="70">
                      <div class="d-flex flex-column ml-3"> <span class="business">Tarjeta de Crédito</span> <span class="plan">1234 XXXX XXXX 2570</span> </div>
                  </div>
                  <div class="form-check form-check-inline center">
                <input class="form-check-input" type="radio" value="comprador" name="rol" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  
                </label>
              </div>
              </div>
              @foreach($metododepago as $metodo)
              {{ $metodo->nombre}}
              
              {{ $metodo->banco}}
              
              
              <div class="credit rounded mt-2 d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/qHX7vY1.png" class="rounded" width="70">
                      <div class="d-flex flex-column ml-3"> <span class="business">{{ $metodo->tipo_tarjeta}}</span> <span class="plan">{{ $metodo->cuenta}}</span> </div>
                  </div>
                  <div class="form-check form-check-inline center">
                    <input class="form-check-input" type="radio" value="comprador" name="rol" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      
                    </label>
                  </div>
              </div>
              @endforeach
              <h6 class="mt-4 text-primary">O agregue un metodo de pago</h6>
              <form  action="{{route('checkLogin')}}" method="POST">
                <<div class="dropdown">
                  <label for="banco">Tipo de cuenta</label>
                    <select display="block" value= "" name="banco" id="banco">
                    <option value="Débito">Débito</option>
                    <option value="Crédito<">Crédito</option>
                    </select>
                </div>
                <label for="nombre">Nombre:</label>
                <input type="text" value="" name="email" placeholder="Nombre">
                <label for="cuenta">Numero de cuenta:</label>
                <input type="int" value="" name="cuenta" placeholder="Numero de cuenta">
                <div class="dropdown">
                  <label for="banco">Banco</label>
                    <select display="block" value= "" name="banco" id="banco">
                    <option value="Banco Estado">Banco Estado</option>
                    <option value="Banco Santander">Banco Santander</option>
                    <option value="Banco de Chile">Banco de Chile</option>
                    <option value="Banco BBVA">Banco BBVA</option>
                    <option value="Banco BCI">Banco BCI</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="PAGAR">

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
  background-color
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