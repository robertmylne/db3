@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Representative'])
    <form class="ui form" action="{{ route('representative.update', ['id' => $representative->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <input type="text"
                   name="first_name"
                   placeholder="First Name"
                   value="{{ $representative->first_name }}">
        </div>
        <div class="field">
            <input type="text"
                   name="last_name"
                   placeholder="Last Name"
                   value="{{ $representative->last_name }}">
        </div>
        <div class="field">
            <input type="text"
                   name="position"
                   placeholder="Position"
                   value="{{ $representative->position }}">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection