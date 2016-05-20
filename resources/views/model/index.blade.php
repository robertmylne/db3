@extends('layout.master')
@section('content')
    @include('component.create', ['title' => 'Models'])
    <table class="ui celled table fixed definition-end">
        <thead>
            <tr>
                <th>Manufacturer</th>
                <th>Model</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{ $model->manufacturer_name }}</td>
                <td>{{ $model->model_name }}</td>
                <td class="center aligned">
                    @include('component.edit', [
                        'id' => $model->id
                    ])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection