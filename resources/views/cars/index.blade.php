@extends('layouts/app')

@section('content')
<div class="container">
    @if(Auth::check() && Auth::user()->role == 'admin')
    <div class="row" >
        <div class="col-md-12 mb-3">
                <a href="{{route('cars.create')}}" class="btn btn-success btn-block">Įvesti naują automobilį</a>
        </div>
    </div>
    @endif

    <div class="row justify-content-md-between">

        @foreach($cars as $car)

            <div class="col-md-4 card-deck">

                @component('components/card', ['car' => $car])
                @endcomponent

            </div>

        @endforeach

        @if (count($cars) == 0)
            <h1>Nėra automobilių</h1>
        @endif


    </div>
</div>
@endsection
