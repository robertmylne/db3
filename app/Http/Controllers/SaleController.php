<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = DB::select('
            select
            car.id,
            car.serial_number,
            sale.sale_date,
            sale.sale_price,
            representative.first_name as r_first_name,
            representative.last_name as r_last_name,
            customer.first_name as c_first_name,
            customer.last_name as c_last_name
            from sale
            inner join car on sale.car_id = car.id
            inner join representative on sale.representative_id = representative.id
            inner join customer on sale.customer_id = customer.id
        ');

        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $cars = DB::select('select * from car');
        $customers = DB::select('select * from customer');
        $representatives = DB::select('select * from representative');

        return view('sale.create', compact('cars', 'customers', 'representatives'));
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            sale (sale_date, sale_price, representative_id, customer_id, car_id)
            values (?, ?, ?, ?, ?)
        ', [
            $request->sale_date,
            $request->sale_price,
            $request->representative_id,
            $request->customer_id,
            $request->car_id
        ]);

        return redirect()->route('sale.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sale = DB::select('
            select *
            from sale
            where id = ?
            limit 1
        ', [$id])[0];

        $cars = DB::select('select * from car');
        $customers = DB::select('select * from customer');
        $representatives = DB::select('select * from representative');

        return view('sale.edit', compact('sale', 'cars', 'customers', 'representatives'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update sale
            set sale_date = ?, sale_price = ?, representative_id = ?, customer_id = ?, car_id = ?
            where id = ?
        ', [
            $request->sale_date,
            $request->sale_price,
            $request->representative_id,
            $request->customer_id,
            $request->car_id,
            $id
        ]);

        return redirect()->route('sale.index');
    }

    public function destroy($id)
    {
        DB::delete('
        delete from sale
        where id = ?
    ', [$id]);

        return back();
    }
}
