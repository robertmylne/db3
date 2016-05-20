<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = DB::select('
            select * from manufacturer
            order by id desc
        ');

        return view('manufacturer.index', compact('manufacturers'));
    }

    public function create()
    {
        return view('manufacturer.create');
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            manufacturer (name)
            values (?)
        ', [
            $request->name
        ]);

        return redirect()->route('manufacturer.index');
    }

    public function edit($id)
    {
        $manufacturer = DB::select('
            select *
            from manufacturer
            where id = ?
            limit 1
        ', [$id])[0];

        return view('manufacturer.edit', compact('manufacturer'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update manufacturer
            set name = ?
            where id = ?
        ', [
            $request->name,
            $id
        ]);

        return redirect()->route('manufacturer.index');
    }

    public function destroy($manufacturer_id)
    {
        /**
         * A "for update" lock prevents the rows from being modified or from being selected with another shared lock
         */
        try {
            DB::beginTransaction();

            // Delete sales
            $car_ids = DB::table('car')->where('manufacturer_id', $manufacturer_id)->get(['id']);

            foreach($car_ids as $car_id) {
                DB::table('sale')->where('car_id', $car_id->id)->delete();
            }

            // Delete cars
            DB::table('car')->where('manufacturer_id', $manufacturer_id)->delete();

            // Delete models
            DB::table('model')->where('manufacturer_id', $manufacturer_id)->delete();

            // Delete manufacturer
            DB::table('manufacturer')->where('id', $manufacturer_id)->delete();

            DB::commit();

            return redirect()->route('manufacturer.index');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

}
