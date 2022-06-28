<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | API Routes |-------------------------------------------------------------------------- | | Here is where you can register API routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | is assigned the "api" middleware group. Enjoy building your API! | */

Route::get('/posts', function () {
    return response()->json([
    'posts' => [
    [
    'title' => 'Post One',
    'content' => 'This is post one.'
    ],
    [
    'title' => 'Post Two',
    'content' => 'THis is Post Two.'
    ]
    ]
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
