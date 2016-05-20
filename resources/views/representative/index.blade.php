@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Representatives'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($representatives as $representative)
            <tr>
                <td>{{ $representative->first_name }}</td>
                <td>{{ $representative->last_name }}</td>
                <td>{{ $representative->position }}</td>
                <td>
                    @include('component.edit', [
                        'id' => $representative->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection