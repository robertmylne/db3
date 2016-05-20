@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Customers'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Post Code</th>
            <th>Gender</th>
            <th>Age</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->post_code }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->age }}</td>
                <td>
                    @include('component.edit', [
                        'id' => $customer->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection