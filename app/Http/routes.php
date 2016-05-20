<?php

#===========================================================
#   Index
#===========================================================
Route::get('/', function () {
    return view('index');
});

#===========================================================
#   Cars
#===========================================================
Route::resource('car', 'CarController');

#===========================================================
#   Manufacturers
#===========================================================
Route::resource('manufacturer', 'ManufacturerController');

#===========================================================
#   Models
#===========================================================
Route::resource('model', 'ModelController');

#===========================================================
#   Customers
#===========================================================
Route::resource('customer', 'CustomerController');

#===========================================================
#   Representatives
#===========================================================
Route::resource('representative', 'RepresentativeController');

#===========================================================
#   Sales
#===========================================================
Route::resource('sale', 'SaleController');

#===========================================================
#   Purchases
#===========================================================
Route::resource('purchase', 'PurchaseController');