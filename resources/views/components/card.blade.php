<div class="card">

      <div class="card-body">
        <h5 class="card-title card-header">{{$car->pavadinimas}}</h5>
        <h4 class="card-title card-header">{{$car->klase}}</h4>
        <img class="card-img-top" src="{{$car->image_url}}" alt="Card image cap">
        <p>Pavarų dėžė: <span class="badge badge-success">{{$car->deze}}</span></p>
        <p>Kuro tipas: <span class="badge badge-success">{{$car->kuras}}</span></p>        
        <p>Paros kaina: <span class="badge badge-success">{{number_format($car->kaina, 2)}}&euro;</span></p>
        <p class="card-text">{{str_limit($car->aprasymas, 200)}}</p>

      </div>

      <form class="js-add-to-cart" action="{{-- route('cart.store') --}}" method="POST" >
            @csrf
            <input id="car_id" type="hidden" name="car_id" value="{{ $car->id }}">
            <button class=" btn btn-success btn-block" >Įtraukti į užsakymą</button>
      </form>
      @if(Auth::check() && Auth::user()->role == 'admin')
      <div>
          <a href="{{-- route('car.edit', $car->id) --}}" class="btn btn-secondary btn-block">Redaguoti</a>
      </div>

          <form class="" action="{{ route('cars.destroy', $car->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-warning btn-block" name="button">Ištrinti automobilį</button>
          </form>
         @endif
</div>
