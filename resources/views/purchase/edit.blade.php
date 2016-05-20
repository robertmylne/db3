@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Purchase'])
    <form class="ui form" action="{{ route('purchase.update', ['id' => $purchase->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <select name="representative_id" class="ui dropdown">
                <option value="" disabled>Representative</option>
                @foreach($representatives as $representative)
                    <option value="{{ $representative->id }}">{{ $representative->first_name . ' ' . $representative->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label for="">Purchase Date</label>
            <input type="datetime-local"
                   name="purchased_on"
                   value="{{ str_replace(" ", "T", $purchase->purchased_on) }}">
        </div>
        <div class="field">
            <label for="">Arrived In Store</label>
            <input type="datetime-local"
                   name="arrived"
                   value="{{ str_replace(" ", "T", $purchase->arrived) }}">
        </div>
        <div class="field">
            <input type="text"
                   name="price"
                   placeholder="Price"
                   value="{{ $purchase->price }}">
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection