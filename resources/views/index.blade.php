<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
</head>
@extends('layouts.app')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading text-primary">{{ env('APP_NAME') }}</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too
                short so folks don't simply skip over it entirely.</p>
            <p>
                <a href="{{ route('car.index') }}" class="btn btn-primary my-2">Webshop</a>
                <a href="{{ route('store.index') }}" class="btn btn-secondary my-2">Contact</a>
            </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container center">
            <h2 class="text-center text-primary">Some of our Cars</h2>
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="{{ $car->img }}">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Model: {{ $car->name }}</li>
                                <li class="list-group-item">Brand: {{ $car->brand->name }}</li>
                                <li class="list-group-item">Type of gas: {{ $car->gas->name }}</li>
                                @if ($car->isAutomatic)
                                    <li class="list-group-item">Automatic: Yes</li>
                                @else
                                    <li class="list-group-item">Automatic: No</li>
                                @endif
                            </ul>
                            <div class="card-body">
                                <a href="{{ url('car/' . $car->id) }}" class="card-link">Check this car</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- @extends('layouts.footer') --}}

    </html>
@endsection
