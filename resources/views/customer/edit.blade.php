@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Customer'])
    <form class="ui form" action="{{ route('customer.update', ['id' => $customer->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <input type="text"
                   name="first_name"
                   placeholder="First Name"
                   value="{{ $customer->first_name }}">
        </div>
        <div class="field">
            <input type="text"
                   name="last_name"
                   placeholder="Last Name"
                   value="{{ $customer->last_name }}">
        </div>
        <div class="field">
            <input type="text"
                   name="phone"
                   placeholder="Phone"
                   value="{{ $customer->phone }}">
        </div>
        <div class="field">
            <input type="text"
                   name="post_code"
                   placeholder="Post Code"
                   value="{{ $customer->post_code }}">
        </div>
        <div class="grouped fields">
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio"
                           name="gender"
                           value="M"
                           tabindex="0"
                           class="hidden"
                            {{ ($customer->gender == 'M') ? 'checked' : '' }}>
                    <label>Male</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio"
                           name="gender"
                           value="F"
                           tabindex="0"
                           class="hidden"
                            {{ ($customer->gender == 'F') ? 'checked' : '' }}>
                    <label>Female</label>
                </div>
            </div>
        </div>
        <div class="field">
            <input type="text"
                   name="age"
                   placeholder="Age"
                   value="{{ $customer->age }}">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection