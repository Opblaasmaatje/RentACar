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
        <div class="row d-flex justify-content-center">
            <div class="card mb-2">
                <div class="card-header">
                    {{ $store->city }}
                </div>
            </div>
        </div>
        <div id="accordion">
            <h2>Currently rented</h2>
            @if (!empty($invoices))
                @foreach ($invoices as $invoice)
                    @if ($invoice->car->store_id == Auth::user()->id)
                        <div class="card">
                            <div class="card-header" id="heading{{ $invoice->ordernumber }}">
                                <h5 class="mb-0 d-flex justify-content-between">
                                    <button class="btn btn-link" data-toggle="collapse" aria-expanded="false" data-target="#collapse{{ $invoice->ordernumber }}"
                                        aria-expanded="true" aria-controls="collapse{{ $invoice->ordernumber }}">
                                        Order: #{{ $invoice->ordernumber }} - {{ $invoice->created_at }} </button>
                                    <a href="../invoice/{{ $invoice->ordernumber }}" class="btn btn-primary"> Order
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse{{ $invoice->ordernumber }}" class="collapse" ariaaria-labelledby="heading{{ $invoice->ordernumber }}"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $invoice->car->name }} | {{ $invoice->rentStart }} | {{ $invoice->rentEnd }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach

            @endif

        </div>
    </div>
    </div>

    </html>

@endsection
