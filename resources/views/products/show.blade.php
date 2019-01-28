
{{-- widok wyswietlajacy szczegoly produktu --}}

@extends('layouts.app')

@section('title', 'Szczegóły produktu')

@section('content')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text"><strong>Cena netto:</strong> {{$price->price_netto}} zł</p>
    <p class="card-text"><strong>Cena brutto(podatek VAT 23%):</strong> {{$price->price_brutto}} zł</p>
    <a href="{{ action('ProductsController@edit', $product->id) }}" class="btn btn-warning">Edytuj</a>
    {!! Form::model($product, ['method'=>'DELETE', 'class'=>'form-horizontal', 'style'=>'display: inline', 'action'=>['ProductsController@destroy', $product->id]]) !!}
            <button class="btn btn-danger" type="submit">Usuń</button>
    {!! Form::close() !!} 
    <a href="{{ action('ProductsController@index') }}" class="card-link">Wróć</a>
  </div>
</div>

@stop