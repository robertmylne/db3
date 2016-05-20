@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Manufacturers'])
    <table class="ui celled table fixed definition-end">
        <thead>
        <tr>
            <th>Manufacturer</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($manufacturers as $manufacturer)
            <tr>
                <td>{{ $manufacturer->name }}</td>
                <td>
                    @include('component.edit', [
                        'id' => $manufacturer->id
                    ])
                    @include('component.delete', [
                        'route' => 'manufacturer.destroy',
                        'id' => $manufacturer->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection