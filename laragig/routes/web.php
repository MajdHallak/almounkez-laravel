<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
// All Listings
Route::get('/', function () {
    return view('listings',
    [
    'heading' => 'Latest Listing',
    'listings' => Listing::all(),
    ]);
});

// Single Listing:
Route::get('/listings/{listingId}', function (Listing $listingId) {
    return view('listing', [
    'listing' => Listing::find($listingId),
    ]);
});

// Route::get('/hello', function () {
//     return response('<h1>Welcome</h1>', 200)
//     ->header('content-type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     ddd($id);
//     return response('posts ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });
