@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Customer'])
    <form class="ui form" action="{{ route('customer.store') }}" method="post">
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
                   name="phone"
                   placeholder="Phone">
        </div>
        <div class="field">
            <input type="text"
                   name="post_code"
                   placeholder="Post Code">
        </div>
        <div class="grouped fields">
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="gender" value="M" tabindex="0" class="hidden" checked="checked">
                    <label>Male</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="gender" value="F" tabindex="0" class="hidden">
                    <label>Female</label>
                </div>
            </div>
        </div>
        <div class="field">
            <input type="text"
                   name="age"
                   placeholder="Age">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection
@section('scripts')
    <script>
        $('.ui.radio.checkbox').checkbox();
    </script>
@endsection