@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Sales'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>Serial Number</th>
            <th>Sale Date</th>
            <th>Sale Price</th>
            <th>Customer</th>
            <th>Representative</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->serial_number }}</td>
                <td>{{ $sale->sale_date }}</td>
                <td>${{ $sale->sale_price }}</td>
                <td>{{ $sale->c_first_name . ' ' . $sale->c_last_name }}</td>
                <td>{{ $sale->r_first_name . ' ' . $sale->r_last_name }}</td>
                <td>
                    @include('component.edit', [
                       'id' => $sale->id
                   ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection