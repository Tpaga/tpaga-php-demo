@extends('layouts.default')
@section('paymentcontent')
    


<div class="container">

	@if ($error)
	<div class="alert alert-danger" role="alert">Failed transaction!!</div>    
	@else
	<div class="alert alert-success" role="alert">Well done! You get: {{$description}} for {{$amount}}, Charge id: . {{$chargeid}}</div>
	@endif


</div>

@stop

