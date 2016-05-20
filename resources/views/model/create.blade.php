@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Add Model'])
    <form class="ui form edit" action="{{ route('model.store') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <select name="manufacturer_id" class="ui dropdown">
                <option value="" disabled>Manufacturer</option>
                @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <input type="text"
                   name="name"
                   placeholder="Model Name">
        </div>
        <div class="field">
            <input type="text"
                   name="year"
                   placeholder="Year">
        </div>
        <div class="field">
            <label for="">Colours</label>
            @foreach([
                'black', 'brown', 'gold', 'blue', 'green', 'grey', 'red', 'silver', 'white'
            ] as $colour)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="colours[]"
                           value="{{ $colour }}">
                    <label>{{ $colour }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <div class="field">
            <label for="">Transmission</label>
            @foreach([
                'automatic', 'semi_automatic', 'manual'
            ] as $transmission)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="transmissions[]"
                           value="{{ $transmission }}">
                    <label>{{ $transmission }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <div class="field">
            <label for="">Seats</label>
            @foreach([
                '2', '5', '7'
            ] as $seats)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="seats[]"
                           value="{{ $seats }}">
                    <label>{{ $seats }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <div class="field">
            <label for="">Doors</label>
            @foreach([
                '3', '5'
            ] as $doors)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="doors[]"
                           value="{{ $doors }}">
                    <label>{{ $doors }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <div class="field">
            <label for="">Cylinders</label>
            @foreach([
                'inline-4', 'inline-6', 'v6', 'v8', 'v10', 'v12', 'v16'
            ] as $cylinders)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="cylinders[]"
                           value="{{ $cylinders }}">
                    <label>{{ $cylinders }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <div class="field">
            <label for="">Body Types</label>
            @foreach([
                'hatchback', 'convertible', 'coupe', 'sedan', 'station_wagon'
            ] as $bodyTypes)
                <div class="ui checkbox">
                    <input type="checkbox"
                           tabindex="0"
                           class="hidden"
                           name="body_types[]"
                           value="{{ $bodyTypes }}">
                    <label>{{ $bodyTypes }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
            @endforeach
        </div>
        <button class="ui button blue fluid" type="submit">Submit</button>
    </form>
@endsection
@section('scripts')
    <script>
        $('.ui.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
    </script>
@endsection