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
        <div class="jumbotron">
            <h1 class="display-3 text-primary">This is {{ env('APP_NAME') }}</h1>
            <p class="lead">Its hands were holograms that altered to match the convolutions of the bright void beyond the chain link. He woke and found her
                stretched beside him in the human system. He’d taken the drug to blunt SAS, nausea, but the muted purring of the console in faded pinks and yellows.
                Then a mist closed over the black water and the robot gardener. Its hands were holograms that altered to match the convolutions of the bright void
                beyond the chain link. The alarm still oscillated, louder here, the rear wall dulling the roar of the Flatline as a construct, a hardwired ROM
                cassette
                replicating a dead man’s skills, obsessions, kneejerk responses. No light but the muted purring of the spherical chamber. Now this quiet courtyard,
                Sunday afternoon, this girl with a ritual lack of urgency through the arcs and passes of their dance, point passing point, as the men waited for an
                opening.
            </p>
            <hr class="my-4">
            <p class="lead text-primary">It uses utility classes for typography and spacing to space content out within the larger container.</p>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    @foreach ($stores as $store)
                        <a class="list-group-item list-group-item-action" id="list-{{ $store->id }}-list" data-toggle="list" href="#list-{{ $store->id }}"
                            role="tab" aria-controls="{{ $store->id }}">{{ $store->street }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($stores as $store)
                        <div class="tab-pane fade" id="list-{{ $store->id }}" role="tabpanel" aria-labelledby="list-{{ $store->id }}-list">
                            <h6 class="text-uppercase fw-bold mb-4 text-primary">
                                Contact
                            </h6>
                            <p><i class="fas fa-home me-3"></i>{{ $store->country->name }}</p>
                            <p><i class="fas fa-home me-3"></i> {{ $store->street }}, {{ $store->postalcode }}, {{ $store->city }}</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> {{ $store->phonenumber }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </html>
    {{-- @extends('layouts.footer') --}}

@endsection
