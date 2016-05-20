<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    public function index()
    {
        $models = DB::select('
            select  model.id, model.name AS model_name, manufacturer.name AS manufacturer_name
            from model
            inner join manufacturer on model.manufacturer_id = manufacturer.id
            order by id desc
        ');

        return view('model.index', compact('models'));
    }

    public function create()
    {
        $manufacturers = DB::select('
            select * from manufacturer
        ');

        return view('model.create', compact('manufacturers'));
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            model (manufacturer_id, name, year, colour, transmission, seats, door, cylinders, body)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ', [
            $request->manufacturer_id,
            $request->name,
            $request->year,
            ($request->colours) ? implode(',', $request->colours) : '',
            ($request->transmissions) ? implode(',', $request->transmissions) : '',
            ($request->seats) ? implode(',', $request->seats) : '',
            ($request->doors) ? implode(',', $request->doors) : '',
            ($request->cylinders) ? implode(',', $request->cylinders) : '',
            ($request->body_types) ? implode(',', $request->body_types) : ''
        ]);

        return redirect()->route('model.index');
    }

    public function edit($id)
    {
        $manufacturers = DB::select('
            select * from manufacturer
        ');

        $model = DB::select('
            select *
            from model
            where id = ?
            limit 1
        ', [$id])[0];

        return view('model.edit', compact('model', 'manufacturers'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update model
            set manufacturer_id = ?, name = ?, year = ?,
                colour = ?, transmission = ?, seats = ?, door = ?, cylinders = ?, body = ?
        ', [
            $request->manufacturer_id,
            $request->name,
            $request->year,
            ($request->colours) ? implode(',', $request->colours) : '',
            ($request->transmissions) ? implode(',', $request->transmissions) : '',
            ($request->seats) ? implode(',', $request->seats) : '',
            ($request->doors) ? implode(',', $request->doors) : '',
            ($request->cylinders) ? implode(',', $request->cylinders) : '',
            ($request->body_types) ? implode(',', $request->body_types) : ''
        ]);

        return back();
    }

    public function destroy($id)
    {
        dd($id);
    }
}