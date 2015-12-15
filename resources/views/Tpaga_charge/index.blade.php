<hmtl>
  <head>

    <title>TPAGA</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style>
      .center{
          text-align: center;
          padding:10px;
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
      <div class="row">
        <h1> <img src="..." alt="TPAGA"> </h1>
      </div>
    </div>

    <div class="container">
      {!! Form::open(array('url' => '/charge', 'method' => 'post')) !!}
      <div class="row">
        <div class="col-xs-4 ">
          <a href="#" class="thumbnail">
            <img src="..." alt="COMBO1">
          </a>

          {!! Form::checkbox('products[]', 'Combo 1', true) !!}
          {!! Form::label('combo1', 'Combo 1:') !!}
          ${!! Form::label('amount1', '3000 ') !!}

        </div>
        <div class="col-xs-4 ">
          <a href="#" class="thumbnail">
            <img src="..." alt="COMBO2">
          </a>

          {!! Form::checkbox('products[]', 'Combo 2', false) !!}
          {!! Form::label('combo2', 'Combo 2: ') !!}
          ${!! Form::label('amount2', '4500 ') !!}

        </div>
        <div class="col-xs-4  ">
          <a href="#" class="thumbnail">
            <img src="..." alt="COMBO3">
          </a>

          {!! Form::checkbox('products[]', 'Combo 3', false) !!}
          {!! Form::label('combo3', 'Combo 3: ') !!}
          ${!! Form::label('amount3', '2800 ') !!}

        </div>
      </div>
    </div>

    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">DETAILS</label></div>
        <div class="panel-body ">
          

              <!-- Title form input -->
              <div class="form-group">
                  {!! Form::label('cardnumber', 'Card number:') !!}
                  {!! Form::text('cardnumber', null, ['class' => 'form-control']) !!}
              </div>

              <!-- Content form input -->
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-6">
                    {!! Form::label('firstname', 'First name:') !!}
                    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-xs-6">
                    {!! Form::label('lastname', 'Last name:') !!}
                    {!! Form::text('lastname', null, ['class' => 'form-control']) !!} 
                  </div>  
                </div>              
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    {!! Form::label('duedate', 'Due date:') !!}
                  </div>
                  <div class="col-xs-3">
                    {!! Form::label('duemonth', 'Month:') !!}
                    {!! Form::text('duemonth', null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-xs-3">
                    {!! Form::label('dueyear', 'Year:') !!}
                    {!! Form::text('dueyear', null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-xs-3">
                    {!! Form::label('securitycode', 'Security code:') !!}
                    {!! Form::text('securitycode', null, ['class' => 'form-control']) !!}
                  </div>

                </div>              
              </div>

              <div class="form-group">
                  {!! Form::submit('Pay!') !!}
           
              </div>


          {!! Form::close() !!}
        </div>
      </div>
     </div>     
  </body>
</html>