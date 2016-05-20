@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Manufacturer'])
    <form class="ui form edit" action="{{ route('manufacturer.update', ['id' => $manufacturer->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <input type="text"
                   name="name"
                   placeholder="Manufacturer"
                   value="{{ $manufacturer->name }}">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection