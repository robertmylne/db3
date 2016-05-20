<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = DB::select('
                select  car.*, manufacturer.name AS manufacturer_name, model.name AS model_name
                from car
                inner join manufacturer on car.manufacturer_id = manufacturer.id
                inner join model on car.model_id = model.id
                order by id desc
            ');

        return view('car.index', compact('cars'));
    }

    public function create()
    {
        $manufacturers = DB::select('select * from manufacturer');
        $models = DB::select('select * from model');
        $purchases = DB::select('select * from purchase');

        return view('car.create', compact('manufacturers', 'models', 'purchases'));
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            car (serial_number, license_plate, price, colour, manufacturer_id, model_id, purchase_id)
            values (?, ?, ?, ?, ?, ?, ?)
        ', [
            $request->serial_number,
            $request->license_plate,
            $request->price,
            $request->colour,
            $request->manufacturer_id,
            $request->model_id,
            $request->purchase_id
        ]);

        return redirect()->route('car.index');
    }

    public function edit($id)
    {
        $car = DB::select('
            select *
            from car
            where id = ?
            limit 1
        ', [$id])[0];

        $manufacturers = DB::select('select * from manufacturer');
        $models = DB::select('select * from model');
        $purchases = DB::select('select * from purchase');

        return view('car.edit', compact('car', 'manufacturers', 'models', 'purchases'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update car
            set serial_number = ?, license_plate = ?,
                price = ?, colour = ?,
                manufacturer_id = ?, model_id = ?,
                purchase_id = ?
            where id = ?
        ', [
            $request->serial_number,
            $request->license_plate,
            $request->price,
            $request->colour,
            $request->manufacturer_id,
            $request->model_id,
            $request->purchase_id,
            $id
        ]);

        return redirect()->route('car.index');
    }

    public function destroy($serial_number)
    {
        DB::delete('
            delete from car
            where serial_number = ?
        ', [$serial_number]);

        return back();
    }
}
