<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="container">
    <h1>{{ env('APP_NAME') }}</h1>
    <h3>Customer email: {{ $invoice->email }}</h3>
    <table class="table">
        Order: #{{ $invoice->ordernumber }}
        <thead>
            <tr>
                <th scope="col">Car</th>
                <th scope="col">Price per day</th>
                <th scope="col">Date start</th>
                <th scope="col">Date end</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $invoice->car->name }}</td>
                <td>${{ $invoice->car->price }}</td>
                <td>{{ $invoice->rentStart }}</td>
                <td>{{ $invoice->rentEnd }}</td>
            </tr>
        </tbody>
    </table>

</div>


</html>
