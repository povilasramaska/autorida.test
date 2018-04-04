@extends('layouts/app')

@section('content')

<div class="container">



    <div class="card">

          <div class="card-body">
            <h5 class="card-title card-header">{{$dish->title}}</h5>
            <div class="row justify-content-between">
                <div class="col-md-3 align-self-center">
                    <img class="card-img-top" src="/{{$dish->image_url}}" alt="Card image cap">
                </div>
                <div class="col-md-9 align-self-center">
                    <p>Price: <span class="badge badge-success">{{number_format($dish->price, 2)}}&euro;</span></p>
                    <p class="card-text">{{str_limit($dish->description, 200)}}</p>
                </div>
            </div>



          </div>

          <form action="{{ route('cart.store', $dish->id) }}" method="POST">
                @csrf
                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                <button class="js-add-to-cart btn btn-success btn-block">Add to cart</button>
          </form>
          @if(Auth::check() && Auth::user()->role == 'admin')
          <div>
              <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-secondary btn-block">Edit</a>
          </div>
              <form class="" action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-warning btn-block" name="button">Delete Dish</button>
              </form>
            @endif
    </div>
</div>
@endsection
