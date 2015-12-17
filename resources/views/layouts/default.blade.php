<hmtl>
  <head>

    <title>TPAGA</title>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  {!! Html::style('assets/css/bootstrap.css') !!}
 
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
 
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script type="text/javascript">
    $('#tapagacarousel').carousel({
        interval: 1200
    });
  </script>
  
    @section('header')
      
    @show

  <style type="text/css">
     body { background: #D3D3D3 !important; } 
  </style>

  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <div class="row">
          <div class="col-xs-8">
            <h1>COMBOMARKET<small>Eat online!</small></h1>
          </div>
          <div class="col-xs-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span> 
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container">
      <div id="tpagacarousel" class="carousel slide">
        <ol class = "carousel-indicators">
            <li data-target = "#tpagacarousel" data-slide-to = "0" class="active"></li>
            <li data-target = "#tpagacarousel" data-slide-to = "1"></li>
        </ol>

        <div class ="carousel-inner">
          <div class = "item active">
            <img src = "{{asset('assets/images/bannerimg6.jpg')}}" alt ="bimg1" class="img-responsive">
          </div>

          <div class = "item">
            <img src = "{{asset('assets/images/bannerimg7.jpg')}}" alt ="bimg1" class="img-responsive">
          </div>
        </div>

        <a class="carousel-control left" href ="#tpagacarousel" data-slide ="prev">
          <span class = "icon-prev"></span>
        </a>

        <a class="carousel-control right" href ="#tpagacarousel" data-slide ="next">
          <span class = "icon-next"></span>
        </a>

      </div>
    </div>



    @section('maincontent')
      
    @show
    <div class="container">
      <div class="row">
        <h1> <img src="{{asset('assets/images/logo.png')}}" alt="TPAGA" height="90" width="250"> </h1>
      </div>
    </div>


    @section('paymentcontent')
      
    @show

    
 </body>

</html>