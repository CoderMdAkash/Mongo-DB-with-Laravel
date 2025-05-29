<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     dd(phpinfo());
//     return view('welcome');
// });


use App\Models\Test;
use Illuminate\Http\Request;

Route::get('/', function() {
    
    $tests = Test::latest()->paginate(8);

    return view('test', compact('tests'));
});

Route::get('/create', function() {
    return view('create');
});
Route::post('/store', function(Request $request) {
    Test::create(['name' => $request->name]);
    return redirect('/');
});
Route::get('/edit/{id}', function(Request $request, $id) {
    $test = Test::find($id);
    return view('edit',  compact('test'));
});
Route::post('/update', function(Request $request) {
    Test::find($request->id)->update([
        'name' => $request->name
    ]);
    return redirect('/');
});
Route::get('/delete/{id}', function(Request $request, $id) {
    Test::find($id)->delete();
    return redirect('/');
});