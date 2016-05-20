@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Purchases'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>Purchase Date</th>
            <th>Arrived</th>
            <th>Price</th>
            <th>Representative</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <tr>
                <td>{{ $purchase->purchased_on }}</td>
                <td>{{ $purchase->arrived }}</td>
                <td>${{ $purchase->price }}</td>
                <td>{{ $purchase->first_name . ' ' . $purchase->last_name }}</td>
                <td>
                    @include('component.edit', [
                        'id' => $purchase->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection