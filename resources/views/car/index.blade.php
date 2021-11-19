<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
</head>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-sm-4 mt-4">
                    <div class="card">
                        <div class="bg-dark text-white">
                            <img class="card-img" src="{{ $car->img }}" alt="Card image">
                            <div class="card-img-overlay">
                                <h5 class="card-title"> <a class="text-white" href="{{ url('car/' . $car->id) }}">{{ $car->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is
                            a
                            little bit longer.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Located at: <a href="{{ route('store.index') }}">{{ $car->store->street }}</a>
                    </div>
                </div>
            @endforeach
        </div>

    </html>
    {{-- @extends('layouts.footer') --}}

@endsection
