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

<body class="container-fluid">
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
                  <div class="col-xs-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block">
                      <span class="glyphicon glyphicon-share-alt"></span> Continuar comprando
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
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
                  <h4 class="text-right">Total <strong>$50.00</strong></h4>
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-success btn-block">
                    Checkout
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
</style>