<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = DB::select('
            select purchase.*, representative.first_name, representative.last_name
            from purchase
            inner join representative on purchase.representative_id = representative.id
            order by id desc
        ');
        
        return view('purchase.index', compact('purchases'));
    }

    public function create()
    {
        $representatives = DB::select('select * from representative');

        return view('purchase.create', compact('representatives'));
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into purchase (purchased_on, arrived, price, representative_id)
            values (?, ?, ?, ?)
        ', [
            $request->purchased_on,
            $request->arrived,
            $request->price,
            $request->representative_id
        ]);

        return redirect()->route('purchase.index');
    }

    public function edit($id)
    {
        $purchase = DB::select('
            select *
            from purchase
            where id = ?
            limit 1
        ', [$id])[0];


        $representatives = DB::select('select * from representative');

        return view('purchase.edit', compact('purchase', 'representatives'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update purchase
            set purchased_on = ?, arrived = ?, price = ?, representative_id = ?
            where id = ?
        ', [
            $request->purchased_on,
            $request->arrived,
            $request->price,
            $request->representative_id,
            $id
        ]);

        return redirect()->route('purchase.index');
    }

    public function destroy($id)
    {
        DB::delete('
            delete from purchase
            where id = ?
        ', [$id]);

        return back();
    }
}
