@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Manufacturer'])
    <form class="ui form" action="{{ route('manufacturer.store') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <input type="text"
                   name="name"
                   placeholder="Manufacturer">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection