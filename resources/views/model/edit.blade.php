@extends('layout.master')
@section('content')
    @include('component.title', ['title' => 'Edit Model'])
    <form class="ui form edit" action="{{ route('model.update', ['id' => $model->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="field">
            <select name="manufacturer_id" class="ui dropdown">
                <option value="" disabled>Manufacturer</option>
                @foreach($manufacturers as $manufacturer)
                    <option
                            value="{{ $manufacturer->id }}"
                            {{ ($manufacturer->id == $model->manufacturer_id) ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <input type="text"
                   name="name"
                   placeholder="Model Name"
                   value="{{ $model->name }}">
        </div>
        <div class="field">
            <input type="text"
                   name="year"
                   placeholder="Year"
                   value="{{ $model->year }}">
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
                           value="{{ $colour }}"
                            {{ (in_array($colour, explode(',', $model->colour))) ? 'checked' : '' }}>
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
                           value="{{ $transmission }}"
                            {{ (in_array($transmission, explode(',', $model->transmission))) ? 'checked' : '' }}>
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
                           value="{{ $seats }}"
                            {{ (in_array($seats, explode(',', $model->seats))) ? 'checked' : '' }}>
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
                           value="{{ $doors }}"
                            {{ (in_array($doors, explode(',', $model->door))) ? 'checked' : '' }}>
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
                           value="{{ $cylinders }}"
                            {{ (in_array($cylinders, explode(',', $model->cylinders))) ? 'checked' : '' }}>
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
                           value="{{ $bodyTypes }}"
                            {{ (in_array($bodyTypes, explode(',', $model->body))) ? 'checked' : '' }}>
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