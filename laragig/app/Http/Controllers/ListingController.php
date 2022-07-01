<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        // dd(request()->tag);
        return view('listings.index',
        [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))-> /* get() */simplePaginate(4)
        ]);
    }

    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            // model find() is already included in $listing
            'listing' => $listing
        ]);
    }

    // SHOW CREATE FORM:
    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            "title" => 'required',
            "company" => ['required', Rule::unique('listings', 'company')],
            "location" => 'required',
            "website" => 'required',
            "email" => ['required', 'email'],
            "tags" => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/')
            ->with('message', 'Listing created Successfully!');
    }
}