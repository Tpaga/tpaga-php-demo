<hmtl>
  <head>

    <title>TPAGA</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    @section('header')
      
    @show

  </head>
  <body>


    <div class="container">
      <div class="page-header">
        <h1>COMBOMARKET<small>Eat online!</small></h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <h1> <img src="{{asset('assets/images/logo.png')}}" alt="TPAGA" height="90" width="250"> </h1>
      </div>
    </div>

        @section('content')
          
        @show

    
  </body>
</html>