<hmtl>
  <head>

    <title>TPAGA</title>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  {!! Html::style('assets/css/bootstrap.css') !!}
 
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
 
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  
 
    @section('header')
      
    @show

  <style type="text/css">
    body { 
      background: #330000 !important; 
      color: #FF6633   !important;
    } 

    small{
      color:#FFFFCC !important;
      font-style: italic;
    }


    nav {
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.22);
      background-color: #FFFFCC !important;
        
      .navbar-brand {
        color: #bd1e23 !important;
        font-weight: bold;
        &:hover {
          text-decoration: none;
        }
      }
    }
  </style>

  </head>
  <body>
    <div class="container">
      <div class="page-header">
            <h1>COMBOMARKET<small>Eat online!</small></h1>
      </div>
    </div>

    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">WELCOME!</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-brand">MENU</li>
                <li class="navbar-brand">SIGN UP</li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </div>









    <div class="container">
      <div id="tpagacarousel" class="carousel slide">
        <ol class = "carousel-indicators">
            <li data-target = "#tpagacarousel" data-slide-to = "0" class="active"></li>
            <li data-target = "#tpagacarousel" data-slide-to = "1"></li>
            <li data-target = "#tpagacarousel" data-slide-to = "2"></li>
        </ol>

        <div class ="carousel-inner">
          <div class = "item active">
            <img src = "{{asset('assets/images/bannerimg6.jpg')}}" alt ="bimg1" class="img-responsive">
          </div>

          <div class = "item">
            <img src = "{{asset('assets/images/bannerimg7.jpg')}}" alt ="bimg2" class="img-responsive">
          </div>

          <div class = "item">
            <img src = "{{asset('assets/images/bannerimg8.jpg')}}" alt ="bimg3" class="img-responsive">
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
        <h1> <img src="{{asset('assets/images/logo.png')}}" alt="TPAGA" height="50" width="220"> </h1>
      </div>
    </div>


    @section('paymentcontent')
      
    @show

  <script type="text/javascript">
    $('#tpagacarousel').carousel({
      interval: 4000
    });
  </script>
    
 </body>

</html>