@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Car'])
    <form class="ui form" action="{{ route('car.update', ['id' => $car->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <input type="text"
                   name="serial_number"
                   placeholder="Serial Number"
                   value="{{ $car->serial_number }}">
        </div>
        <div class="field">
            <input type="text"
                   name="license_plate"
                   placeholder="License Plate"
                   value="{{ $car->license_plate }}">
        </div>
        <div class="field">
            <input type="text"
                   name="price"
                   placeholder="Price"
                   value="{{ $car->price }}">
        </div>
        <div class="field">
            <input type="text"
                   name="colour"
                   placeholder="Colour"
                   value="{{ $car->colour }}">
        </div>
        <div class="field">
            <label for="">Manufacturer</label>
            <select name="manufacturer_id" class="ui dropdown">
                <option value="" disabled>Manufacturer</option>
                @foreach($manufacturers as $manufacturer)
                    <option
                            value="{{ $manufacturer->id }}"
                            {{ ($manufacturer->id == $car->manufacturer_id) ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label for="">Model</label>
            <select name="model_id" class="ui dropdown">
                <option value="" disabled>Model</option>
                @foreach($models as $model)
                    <option
                            value="{{ $model->id }}"
                            {{ ($model->id == $car->model_id) ? 'selected' : '' }}>{{ $model->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label for="">Purchase</label>
            <select name="purchase_id" class="ui dropdown">
                <option value="" disabled>Purchase</option>
                @foreach($purchases as $purchase)
                    <option
                            value="{{ $purchase->id }}"
                            {{ ($purchase->id == $car->purchase_id) ? 'selected' : '' }}>{{ $purchase->id }}</option>
                @endforeach
            </select>
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection