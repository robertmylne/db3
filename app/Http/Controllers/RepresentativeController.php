<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RepresentativeController extends Controller
{
    public function index()
    {
        $representatives = DB::select('
            select * from representative
            order by id desc
        ');

        return view('representative.index', compact('representatives'));
    }

    public function create()
    {
        return view('representative.create');
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            representative (first_name, last_name, position)
            values (?, ?, ?)
        ', [
            $request->first_name,
            $request->last_name,
            $request->position
        ]);

        return redirect()->route('representative.index');
    }

    public function edit($id)
    {
        $representative = DB::select('
            select *
            from representative
            where id = ?
            limit 1
        ', [$id])[0];

        return view('representative.edit', compact('representative'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update representative
            set first_name = ?, last_name = ?, position = ?
            where id = ?
        ', [
            $request->first_name,
            $request->last_name,
            $request->position,
            $id
        ]);

        return redirect()->route('representative.index');
    }

    public function destroy($id)
    {
        //
    }
}
