<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller {
    //show all listings
    public function index() {
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        // dd(request()->tag);
        return view(
            'listings.index',
            [
                'listings' => Listing::latest()->filter(request(['tag', 'search']))-> /* get() */simplePaginate(4)
            ]
        );
    }

    //show single listing
    public function show(Listing $listing) {
        // dd($listing->all());
        return view('listings.show', [
            // model find() is already included in $listing
            'listing' => $listing
        ]);
    }

    // SHOW CREATE FORM:
    public function create(Listing $listing) {
        return view('listings.create', [
            'listing' => $listing
        ]);
    }

    public function store(Request $request) {
        // dd($request->all());
        // dd($request->file('logo')->store());
        $formFields = $request->validate([
            "title" => 'required',
            "company" => ['required', Rule::unique('listings', 'company')],
            "location" => 'required',
            "website" => 'required',
            "email" => ['required', 'email'],
            "tags" => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')
            ->with('message', 'Listing created Successfully!');
    }

    // SHOW EDIT FORM
    public function edit(Listing $listing) {
        // dd($listing->description);
        return view("listings.edit", ['listing' => $listing]);
    }
    public function update(Request $request, Listing $listing) {
        // dd($request->all());
        // dd($request->file('logo')->store());
        $formFields = $request->validate([
            "title" => 'required',
            "company" => ['required'],
            "location" => 'required',
            "website" => 'required',
            "email" => ['required', 'email'],
            "tags" => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()
            ->with('message', 'Listing updated Successfully!');
    }

    // public function destroy(Listing $listing)
    // {
    //     $listing->delete();
    //     return redirect('/')->with('message', 'Listing Deleted Successfully!');
    // }





}
