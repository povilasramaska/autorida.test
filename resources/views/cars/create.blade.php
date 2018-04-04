@extends('layouts/app')

@section('content')

<div class="container">
  <div class=" col card-title card-header bg-dark"> Automobilio įvedimas</div>

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="pavadinimas">Pavadinimas</label>
                <input type="text" class="form-control @if($errors->has('pavadinimas')) is-invalid @endif" name="pavadinimas" placeholder="Įveskite pavadinimą" value="{{old('pavadinimas')}}">
                @if($errors->has('pavadinimas'))
                <div class="invalid-feedback">
                    {{$errors->first('pavadinimas')}}
                </div>
                @endif
                <small class="form-text text-muted">Įveskite automobilio pavadinimą</small>
              </div>
              
               <div class="form-group">
                <label for="klase">Klasė</label>
                <input type="text" class="form-control @if($errors->has('klase')) is-invalid @endif" name="klase" placeholder="Įveskite klasę" value="{{old('klase')}}">
                @if($errors->has('klase'))
                <div class="invalid-feedback">
                    {{$errors->first('klase')}}
                </div>
                @endif
                <small class="form-text text-muted">Įveskite automobilio klasę</small>
              </div>

              <div class="row">
                <div class="col">
                    <label for="kaina">Kaina parai</label>
                  <input type="text" name = "kaina" class="form-control @if($errors->has('kaina')) is-invalid @endif" placeholder="0.00&euro;" step="0.01" value="{{old('kaina')}}">
                  @if($errors->has('kaina'))
                  <div class="invalid-feedback">
                      {{$errors->first('kaina')}}
                  </div>
                  @endif
                  <small class="form-text text-muted">Įveskite kainą</small>
                </div>
              </div>
              
               <div class="form-group">
                <label for="kuras">Kuro tipas</label>
                <input type="text" class="form-control @if($errors->has('kuras')) is-invalid @endif" name="kuras" placeholder="Įveskite kuro tipą" value="{{old('kuras')}}">
                @if($errors->has('kuras'))
                <div class="invalid-feedback">
                    {{$errors->first('kuras')}}
                </div>
                @endif
                <small class="form-text text-muted">Įveskite kuro tipą</small>
              </div>

              <div class="form-group">
                <label for="deze">Transmisijos tipas</label>
                <input type="text" class="form-control @if($errors->has('deze')) is-invalid @endif" name="deze" placeholder="Įveskite trasmisijos tipą" value="{{old('deze')}}">
                @if($errors->has('deze'))
                <div class="invalid-feedback">
                    {{$errors->first('deze')}}
                </div>
                @endif
                <small class="form-text text-muted">Įveskite transmisijos tipą</small>
              </div>
              
              <div class="row">
                <div class="col">
                    <label for="image_url">Image url</label>
                  <input type="file" name ="image_url" class="form-control @if($errors->has('image_url')) is-invalid @endif" placeholder=""  value="{{old('image_url')}}">
                  @if($errors->has('image_url'))
                  <div class="invalid-feedback">
                      {{$errors->first('image_url')}}
                  </div>
                  @endif
                  <small class="form-text text-muted">Pasirinkite foto</small>
                </div>
              </div>

              <div class="form-group">
                <label for="aprasymas">Aprašymas</label>
                <textarea class="form-control @if($errors->has('aprasymas')) is-invalid @endif" name="aprasymas" rows="8" cols="80" >{{old('aprasymas')}}</textarea>
                @if($errors->has('aprasymas'))
                <div class="invalid-feedback">
                    {{$errors->first('aprasymas')}}
                </div>
                @endif
              </div>


          <button type="submit" class="btn btn-success btn-block">Išsaugoti automobilį</button>
      </form>

</div>


@endsection
