@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Sale'])
    <form class="ui form" action="{{ route('sale.store') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <label for="">Sale Date</label>
            <input type="datetime-local" name="sale_date">
        </div>
        <div class="field">
            <input type="text"
                   name="sale_price"
                   placeholder="Price">
        </div>
        <div class="field">
            <select name="representative_id" class="ui dropdown">
                <option value="" disabled>Representative</option>
                @foreach($representatives as $representative)
                    <option value="{{ $representative->id }}">{{ $representative->first_name . ' ' . $representative->last_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <select name="customer_id" class="ui dropdown">
                <option value="" disabled>Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->first_name . ' ' . $customer->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <select name="car_id" class="ui dropdown">
                <option value="" disabled>Car</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->serial_number }}</option>
                @endforeach
            </select>
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection