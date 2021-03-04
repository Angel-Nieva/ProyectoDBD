<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carro de compra</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png">
  <link rel="stylesheet" href="estilo.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital@1&display=swap" rel="stylesheet">   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">        
      <div class="container">
              <a class="navbar-brand" href="home"> <img src="https://i.ibb.co/5xCxH1j/DELIFERIALOGO.png" class="logo"
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
                              <a class="nav-link" aria-current="page" href="actualizar">Cuenta</a>
                          </h2>
                      </li>
                      <li class="nav-item letra" id="cuenta">
                          <h2>
                              <a class="nav-link" aria-current="page" href="carrito">Carrito</a>
                          </h2>
                      </li>
                      <li class="nav-item letra salir"  id="salida">
                          <h2>
                              <a class="nav-link" href="index">Salir</a>
                          </h2>
                      </li>
                  </ul>
              </div>
        </div>
    </nav>

  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">
                <div class="row">
                  <div class="col-xs-6">
                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compra</h5>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="panel-body">
              @foreach($producto as $producto)
                <a class="dropdown-item" href="#">{{ $producto->precio }}</a>
              @endforeach
              <div class="row">
                <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                </div>
                <div class="col-xs-4">
                  <h4 class="product-name"><strong>Nombre producto</strong></h4><h4><small>descripcion</small></h4>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-6 text-right">
                    <h6><strong>32.000 <span class="text-muted">x</span></strong></h6>
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value="1">
                  </div>
                  <div class="col-xs-2">
                    <button type="button" class="btn btn-link btn-xs">
                      <span class="glyphicon glyphicon-trash"> </span>
                    </button>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                </div>
                <div class="col-xs-4">
                  <h4 class="product-name"><strong>Nombre producto2</strong></h4><h4><small>descripcion</small></h4>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-6 text-right">
                    <h6><strong>32.000 <span class="text-muted">x</span></strong></h6>
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value="1">
                  </div>
                  <div class="col-xs-2">
                    <button type="button" class="btn btn-link btn-xs">
                      <span class="glyphicon glyphicon-trash"> </span>
                    </button>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="text-center">
                  <div class="col-xs-9">
                    <h6 class="text-right">Added items?</h6>
                  </div>
                  <div class="col-xs-3">
                    <button type="button" class="btn btn-default btn-sm btn-block">
                      Actualizar carro
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <div class="row text-center">
                <div class="col-xs-9">
                  <h4 class="text-right">Total <strong>$37.300 CLP</strong></h4>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block">
                      <span class="glyphicon glyphicon-share-alt"></span> Continuar comprando
                    </button>
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-success btn-block">
                    Ir a pago
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<style>

  body {
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