@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title card-header">Konsolė</h5>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Jūs prisijungėte!
                </div>
            </div>
             <a href="#" type="button" class="btn btn-outline-warning carbtn btn-block">Į pradinį</a>
        </div>
    </div>
</div>
@endsection

