
{{-- widok odpowiadajacy za wyswietlenie formularza edycji --}}

@extends('layouts.app')
@section('title', 'Edytuj produkt')

@section('content')
	
	 @if(count($errors) > 0)
		<div class="alert alert-danger">
		    <ul>
		        @foreach($errors->all() as $error)
		        <li>{{ $error }}</li>
		        @endforeach
		    </ul>
		</div>
	@endif
	
	
	{!! Form::model($product, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action'=>['ProductsController@update', $product->id]]) !!}
            		
		@include('products.forms.product', ['editPrice' => $price, 'buttonText' => 'Edytuj'])

	{!! Form::close() !!}

@stop
