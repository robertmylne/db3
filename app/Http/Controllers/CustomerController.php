<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::select('
            select * from customer
            order by id desc
        ');

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        DB::insert('
            insert into
            customer (first_name, last_name, phone, post_code, gender, age)
            values (?, ?, ?, ?, ?, ?)
        ', [
            $request->first_name,
            $request->last_name,
            $request->phone,
            $request->post_code,
            $request->gender,
            $request->age
        ]);

        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = DB::select('
            select *
            from customer
            where id = ?
            limit 1
        ', [$id])[0];

        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        DB::update('
            update customer
            set first_name = ?, last_name = ?, phone = ?, post_code = ?, gender = ?, age = ?
            where id = ?
        ', [
            $request->first_name,
            $request->last_name,
            $request->phone,
            $request->post_code,
            $request->gender,
            $request->age,
            $id
        ]);

        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        //
    }
}
