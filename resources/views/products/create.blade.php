
{{-- widok odpowiadajacy za wyswietlenie formularza dodawania produktu --}}

@extends('layouts.app')
@section('title', 'Dodaj produkt')

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
	
	{!! Form::open(['url' => 'products']) !!}
	@include('products.forms.product', ['editPrice' => null, 'buttonText' => 'Dodaj'])
	{!! Form::close() !!}
	
@stop
