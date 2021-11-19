<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
</head>
@extends('layouts.app')

<style>
    body {
        background-color: #edf1f5;
        margin-top: 20px;
    }

    .card {
        margin-bottom: 30px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }

    .card .card-subtitle {
        font-weight: 300;
        margin-bottom: 10px;
        color: #8898aa;
    }

    .table-product.table-striped tbody tr:nth-of-type(odd) {
        background-color: #f3f8fa !important
    }

    .table-product td {
        border-top: 0px solid #dee2e6 !important;
        color: #728299 !important;
    }

</style>
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                <ul>
                    <p>Order created! <a href="{{ url('invoice/' . session('status')) }}">{{ session('status') }}</a></p>
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $car->name }}</h3>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="{{ $car->img }}" style="width:90%"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <form action="{{ route('invoice.store') }}" method="post">
                            @csrf
                            <h2 class="mt-5">
                                Price per day ${{ $car->price }}
                            </h2>
                            @if ($rented)
                                This car is currently unaviliable
                            @else
                                <input type="number" hidden required name="car_id" value="{{ $car->id }}">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control" placeholder="Email">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <label>Start renting</label>
                                        <input type="date" required name="rentStart" class="form-control" placeholder="Email">
                                    </div>
                                    <div>
                                        <label>Stop renting</label>
                                        <input type="date" required name="rentEnd" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-rounded">Rent Now</button>
                            @endif
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Brand</td>
                                        <td>{{ $car->brand->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gas type</td>
                                        <td>{{ $car->gas->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Located in</td>
                                        <td>{{ $car->store->street }}</td>
                                    </tr>
                                    <tr>
                                        <td>Currently availble</td>
                                        @if ($rented)
                                            <td>No</td>
                                        @else
                                            <td>Yes</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Automatic</td>
                                        @if ($car->isAutomatic)
                                            <td>Yes</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </html>
    {{-- @extends('layouts.footer') --}}

@endsection
