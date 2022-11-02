<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index(){
        // dd(request()->tag);
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->simplePaginate(6)
            // php artisan vendor:publish->pagination
        ]);
    }
    //show a list
    public function show(Listing $listing){
        return view('listings.listing', [
            'listing' => $listing
        ]);
    }

    // create form
    public function create(){
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request){
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message','listing created successfully!');
    }

    // edit form
    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }
    // update edited form
    public function update(Request $request, Listing $listing){
        // make sure logged in user in owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised action');
        }


        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing Updated successfully');

    }
    //delete listing
    public function destroy(Listing $listing){

        // make sure logged in user in owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised action');
        }

        $listing->delete();

        return redirect('/')->with('message', 'listing deleted successful');
    }
    // manage listing
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
