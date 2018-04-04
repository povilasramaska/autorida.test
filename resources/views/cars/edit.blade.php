@extends('layouts/app')

@section('content')



<div class="container">


        <form action="{{ route('dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
              <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" placeholder="Enter title" value="{{old('title', $dish->title)}}">
                    @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                    @endif
                    <small class="form-text text-muted">Please enter dish title</small>
              </div>

              <div class="row">
                    <div class="col">
                    <label for="price">Price</label>
                      <input type="text" name = "price" class="form-control @if($errors->has('price')) is-invalid @endif" placeholder="0.00&euro;" step="0.01" value="{{old('price', $dish->price)}}">
                      @if($errors->has('price'))
                      <div class="invalid-feedback">
                          {{$errors->first('price')}}
                      </div>
                      @endif
                      <small class="form-text text-muted">Please enter price</small>
                    </div>
              </div>

              <div class="row">
                  <div class="col-md-3 align-self-center">
                          <img class="card-img-top" src="/{{$dish->image_url}}" alt="Card image cap">
                  </div>
                <div class="col-md-9 align-self-center">
                    <label for="image_url">Image URL</label>
                      <input type="file" name = "image_url" class="form-control @if($errors->has('image_url')) is-invalid @endif" value="{{$dish->image_url}}">
                      @if($errors->has('image_url'))
                      <div class="invalid-feedback">
                          {{$errors->first('image_url')}}
                      </div>
                      @endif
                      <small class="form-text text-muted">Please upload image</small>
                      <a class = "btn btn-primary btn-sm" href="{{ route('dish.download', $dish->id)}}">Download image</a>

                  </div>
              </div>



              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @if($errors->has('description')) is-invalid @endif" name="description" rows="8" cols="80" >{{old('description', $dish->description)}}</textarea>
                @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                @endif
              </div>



          <button type="submit" class="btn btn-success btn-block">Update</button>
      </form>

</div>


@endsection
