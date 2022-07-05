<?php

use App\Models\Listing;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use PharIo\Version\UnsupportedVersionConstraintException;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

// Common Resource Routes:
// index: Show all listings
// show: Show single listing
// create: Show form to create new listing
// store: Store new listing <
// edit: Show form to edit listing
// update: Update listing
// destroy: Delete listing

// ALL LISTINGS:
Route::get('/', [ListingController::class, 'index']);

// SHOW CREATE LISTING:
Route::get('/listings/create', [ListingController::class, 'create']);

// STORE LISTING DATA:
Route::post('/listings', [ListingController::class, 'store']);

// SHOW EDIT FORM:
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// EDIT SUBMIT TO UPDATE
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// EDIT SUBMIT TO UPDATE
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// SINGLE LISTING:
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// SHOW REGISTER/CREATE
Route::get('/register', [UserController::class, 'create']);

// CREATE NEW USER
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::post('/login', [UserController::class, 'login']);

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
