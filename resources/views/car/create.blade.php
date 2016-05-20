@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Car'])
    <form class="ui form" action="{{ route('car.store') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <input type="text"
                   name="serial_number"
                   placeholder="Serial Number">
        </div>
        <div class="field">
            <input type="text"
                   name="license_plate"
                   placeholder="License Plate">
        </div>
        <div class="field">
            <input type="text"
                   name="price"
                   placeholder="Price">
        </div>
        <div class="field">
            <input type="text"
                   name="colour"
                   placeholder="Colour">
        </div>
        <div class="field">
            <label for="">Manufacturer</label>
            <select name="manufacturer_id" class="ui dropdown">
                <option value="" disabled>Manufacturer</option>
                @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label for="">Model</label>
            <select name="model_id" class="ui dropdown">
                <option value="" disabled>Model</option>
                @foreach($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label for="">Purchase</label>
            <select name="purchase_id" class="ui dropdown">
                <option value="" disabled>Purchase</option>
                @foreach($purchases as $purchase)
                    <option value="{{ $purchase->id }}">{{ $purchase->id }}</option>
                @endforeach
            </select>
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection