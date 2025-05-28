<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     dd(phpinfo());
//     return view('welcome');
// });


use App\Models\Test;

Route::get('/', function() {
    
    Test::create(['name' => 'First test 01']);
    
    return response()->json([
        'status' => 'success',
        'data' => Test::all()
    ]);
});