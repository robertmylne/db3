@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Cars'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>Serial Number</th>
            <th>Licence Plate</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->serial_number }}</td>
                <td>{{ $car->license_plate }}</td>
                <td>{{ $car->manufacturer_name }}</td>
                <td>{{ $car->model_name }}</td>
                <td>${{ $car->price }}</td>
                <td class="center aligned">
                    @include('component.edit', [
                        'id' => $car->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection