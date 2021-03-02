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
                      <div class="d-flex flex-column ml-4"> <span class="business">Small Business</span> <span class="plan">CHANGE PLAN</span> </div>
                  </div>
                  <!--pricing table-->
                  <div class="d-flex flex-row align-items-center"> <sup class="dollar font-weight-bold">$</sup> <span class="amount ml-1 mr-1">27500 CLP</span>  </div> <!-- /pricing table-->
              </div> <span class="detail mt-5">Detalle de pago</span>
              <div class="credit rounded mt-4 d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/qHX7vY1.png" class="rounded" width="70">
                      <div class="d-flex flex-column ml-3"> <span class="business">Tarjeta de Crédito</span> <span class="plan">1234 XXXX XXXX 2570</span> </div>
                  </div>
                  <div> <input type="text" class="form-control cvv" placeholder="CVC"> </div>
              </div>
              <div class="credit rounded mt-2 d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/qHX7vY1.png" class="rounded" width="70">
                      <div class="d-flex flex-column ml-3"> <span class="business">Tarjeta de Débito</span> <span class="plan">2344 XXXX XXXX 8880</span> </div>
                  </div>
                  <div> <input type="text" class="form-control cvv" placeholder="CVC"> </div>
              </div>
              <h6 class="mt-4 text-primary">ADD PAYMENT METHOD</h6>
              <div class="email mt-2"> <input type="text" class="form-control email-text" placeholder="Email Address"> </div>
              <div class="mt-3"> <button class="btn btn-primary btn-block payment-button">Proceed to payment <i class="fa fa-long-arrow-right"></i></button> </div>
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