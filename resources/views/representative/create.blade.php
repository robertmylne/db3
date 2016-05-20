@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Representative'])
    <form class="ui form" action="{{ route('representative.store') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <input type="text"
                   name="first_name"
                   placeholder="First Name">
        </div>
        <div class="field">
            <input type="text"
                   name="last_name"
                   placeholder="Last Name">
        </div>
        <div class="field">
            <input type="text"
                   name="position"
                   placeholder="Position">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection