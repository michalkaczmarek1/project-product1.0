
{{-- widok wyswietlajacy liste produktów --}}

@extends('layouts.app')
@section('title', 'Lista produktów')


@section('content')

{{-- komunikat sesji o poprawnym dodaniu --}}
@if(Session::has('product_created'))
<div class="alert alert-success">
     {{ Session::get('product_created') }}
</div>
@endif

{{-- komunikat sesji o poprawnym usunieciu --}}
@if(Session::has('product_deleted'))
<div class="alert alert-success">
     {{ Session::get('product_deleted') }}
</div>
@endif

{{-- komunikat sesji o poprawnej aktualizacji danych --}}
@if(Session::has('product_modified'))
<div class="alert alert-success">
     {{ Session::get('product_modified') }}
</div>
@endif

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col" style="width: 200px;">Nazwa produktu</th>
	      <th scope="col">Opis produktu</th>
	      <th scope="col" style="width: 170px;">Data utworzenia</th>
	      <th scope="col" style="width: 170px;">Data modyfikacji</th>
	      <th scope="col" style="width: 200px;">Akcje</th>
	    </tr>
	  </thead>
	  <tbody>
		@foreach($products as $product)
		
		    <tr>
		      <th scope="row">{{ $product->id }}</th>
		      <td>{{ $product->name }}</td>
		      {{-- skrocenie opisu do 100 znaków --}}
		      @php
		      	$subsstr = substr($product->description, 0, 100);
		      @endphp
		      <td>@php echo $subsstr; @endphp...</td>
		      <td>{{ $product->created_at }}</td>
		      <td>{{ $product->updated_at }}</td>
		      <td class="btn btn-sm btn-success"><a href="{{ action('ProductsController@show', $product->id) }}" style="color: white; text-decoration: none;">Szczegóły</a></td>
		      <td class="btn btn-sm btn-success"><a href="{{ action('ProductsController@edit', $product->id) }}" style="color: white; text-decoration: none;">Edytuj</a></td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

@stop