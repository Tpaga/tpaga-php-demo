@extends('layouts.default')

@section('header')

  <script src="{{asset('assets/js/jquery.payment.js')}}"></script>
  <script src="{{asset('assets/js/tpaga.payment.js')}}"></script>

  <style type="text/css" media="screen">
    .has-error input {
      border-width: 2px;
      border-color: red;
    }

    .validation.text-danger:after {
      content: 'Invalid data';
    }

    .validation.text-success:after {
      content: 'Validation passed';
    }


    .panel-default > .panel-heading-custom {
        background: #009999; color: #fff; 
        height: 80px; text-align: center;
        font-style: bold; 

    }

    .padding{
      padding: 10px;
    }
    .center{
      text-align: center;
    }

    .form-text{
      color: black !important;

    }
  </style>

  <script type="text/javascript">
    Payments.setPublicKey("pk_test_qvbvuthlvqpijnr0elmtg5jh");
    
  </script>

  <script>

    $(function() {
      
      $('.cardnumber').payment('formatCardNumber');
      $('.securitycode').payment('formatCardCVC');
      $('.duedate').payment('formatCardExpiry');
      $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        return this;
      };

      $('form').submit(function(e) {

      e.preventDefault();

      var responseHandler = function(err, data) {
        if (err) alert(err.code + " - " + err.message);
        else {
          $('form').append($('<input type="hidden" name="tokenid">').val(data.token));
          $('form').get(0).submit();
        }
      };

      var cardType = $.payment.cardType($('.cardnumber').val());

      $('.cardnumber').toggleInputError(!$.payment.validateCardNumber($('.cardnumber').val()));
      $('.securitycode').toggleInputError(!$.payment.validateCardCVC($('.securitycode').val(), cardType));
      $('.duedate').toggleInputError(!$.payment.validateCardExpiry($('.duedate').payment('cardExpiryVal')));

      $('.cardbrand').text(cardType);
      $('.validation').removeClass('text-danger text-success');
      $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
      


      var errors = $('.has-error');

      if (!errors.length)
      {

        $('.alert').removeClass('alert-danger');
        $('.alert').addClass('alert-success');

        Payments.createToken({
        primaryAccountNumber: $('.cardnumber').val().replace(/\s/g, ""),
        expirationMonth: $('.duedate').payment('cardExpiryVal').month,
        expirationYear: $('.duedate').payment('cardExpiryVal').year,
        cvc: $('.securitycode').val(),
        cardHolderName: $('.firstname').val() + " " + $('.lastname').val()
      }, responseHandler);

        
        
      }
      else
      {
        
        $('.validation').show();
      }

      });
    });
  </script>

  
@stop


@section('maincontent')

   


    <h1 class = "center"> SELECT YOUR PRODUCT!</h1>

    <div class="container padding">
      {!! Form::open(array('url' => '/charge', 'method' => 'post', 'autocomplete' =>'on')) !!}
      <div class="row">
        <div class="col-xs-4 ">
          <a href="#" class="thumbnail">
            <img  class="img-rounded" src="{{asset('assets/images/combo1.jpg')}}" alt="COMBO1" height="200" style="max-height:220px">
          </a>

          {!! Form::checkbox('products[]', 'Combo 1', true) !!}
          {!! Form::label('combo1', 'Combo 1:') !!}
          ${!! Form::label('amount1', '3000 ') !!}

        </div>
        <div class="col-xs-4 ">
          <a href="#" class="thumbnail">
            <img class="img-rounded" src="{{asset('assets/images/combo2.jpg')}}" alt="COMBO2" height="200" style="max-height:220px" >
          </a>

          {!! Form::checkbox('products[]', 'Combo 2', false) !!}
          {!! Form::label('combo2', 'Combo 2: ') !!}
          ${!! Form::label('amount2', '4500 ') !!}

        </div>
        <div class="col-xs-4  " >
          <a href="#" class="thumbnail">
            <img class="img-rounded" src="{{asset('assets/images/combo3.jpg')}}" alt="COMBO3" height="200"  style="max-height:220px">
          </a>

          {!! Form::checkbox('products[]', 'Combo 3', false) !!}
          {!! Form::label('combo3', 'Combo 3: ') !!}
          ${!! Form::label('amount3', '2800 ') !!}

        </div>
      </div>
    </div>


@stop
@section('paymentcontent')    
    <span class="publickey"></span>
    <div class="container">
      
      
      <div class="panel panel-default">
        <div class="panel-heading panel-heading-custom"><h3>CREDIT CARD DETAILS</h3></label></div>
        <div class="panel-body form-text">
          

              <!-- Title form input -->
              
            <div class="row">
              <div class="col-xs-6"> 
                <div class='form-field'> 
                  <div class="form-group">
                    {!! Form::label('cardnumber', 'Card number:') !!}
                    {!! Form::text('cardnumber', null,  ['class' => 'form-control cardnumber', 'required' => 'required', 'placeholder' =>'•••• •••• •••• ••••', 'autocomplete' => 'cardnumber']) !!}
                    <span class="cardbrand"></span>
                  </div>
                </div>
              </div>
              <div class="col-xs-6"> 
                <div class='form-field'>  
                  <div class="form-group">
                    {!! Form::label('installments', 'Installments:') !!}
                    {!! Form::text('installments', null, ['class' => 'form-control installments', 'maxlength' => 2, 'required' => 'required', 'autocomplete' => 'installments']) !!}
                  </div>
                </div>
              </div>
            </div>
              

            <!-- Content form input -->
            
            <div class="row">
              <div class="col-xs-6">
                <div class='form-field'> 
                  <div class="form-group">
                    {!! Form::label('firstname', 'First name:') !!}
                    {!! Form::text('firstname', null, ['class' => 'form-control firstname', 'required' => 'required', 'autocomplete' => 'firstname']) !!}
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class='form-field'> 
                  <div class="form-group">
                    {!! Form::label('lastname', 'Last name:') !!}
                    {!! Form::text('lastname', null, ['class' => 'form-control lastname', 'required' => 'required', 'autocomplete' => 'lastname']) !!} 
                  </div>
                </div>
              </div>  
            </div>              
           

              
            <div class="row">
              <div class="col-xs-2">
                <div class='form-field'> 
                 <div class="form-group">
                    {!! Form::label('duedate', 'Due date:') !!}
                    {!! Form::text('duedate', null, ['class' => 'form-control duedate', 'required' => 'required', 'placeholder' =>'••/••••', 'autocomplete' => 'dueyear']) !!}
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class='form-field'> 
                  <div class="form-group">
                    {!! Form::label('securitycode', 'Security code:') !!}
                    {!! Form::text('securitycode', null, ['class' => 'form-control securitycode', 'required' => 'required', 'placeholder' =>'•••', 'autocomplete' => 'off']) !!}
                  </div>
                </div>
              </div>

            </div>              
              

              <div class="form-group center">

                  {!! Form::submit('Pay for your food!', ['class' => 'btn btn-default']) !!}
           
              </div>

              <div class="alert alert-danger validation" role="alert" hidden="false">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              </div>
              

          {!! Form::close() !!}
        </div>
      </div>
     </div>
    </div>     
 @stop