<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('service', function () {
    return view('service');
})->name('service');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::post('messages', function () {
	// enviar un correo
	$data = request()->all();
	Mail::send("emails.message", $data, function($message) use($data) {
		$message->from($data['email'], $data['name'])
		->to('sbbz650620@gmail.com', 'Baltazar')
		->subject($data['subject']);
	});
	
	// responder al usuario
    return back()->with('flash', $data['name'].'Tu mensaje ha sido recibido');
})->name('messages');

