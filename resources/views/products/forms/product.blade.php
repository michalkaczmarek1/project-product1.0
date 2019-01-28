{{-- widok formularza --}}

@php

  if($editPrice === null){

    $title = 'dodania produktu';

  } else {

    $title = 'edycji produktu';

  }

@endphp

<h2 class="heading">Formularz @php echo $title; @endphp</h2>
<div class="form-group row">
  {!! Form::label('name', 'Nazwa produktu', ['class' => 'col-sm-2 col-form-label']) !!}
  <div class="col-sm-9">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('description', 'Opis produktu', ['class' => 'col-sm-2 col-form-label']) !!}
  <div class="col-sm-9">
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('price', 'Cena netto produktu', ['class' => 'col-sm-2 col-form-label']) !!}
  <div class="col-sm-9">
    {!! Form::text('price', $editPrice, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {!! Form::submit($buttonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{{-- <a href="{{ action('InfoController@admin') }}" class="btn btn-info">Powrót</a> --}}