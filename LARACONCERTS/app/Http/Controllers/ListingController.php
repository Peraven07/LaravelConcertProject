<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show All Listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // Show Single Listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('listings','title')],
            'artist' => 'required',
            'location' => 'required',
            'organizer' => 'required',
            'date' => 'required',
            'time' => 'required',
            'email' => ['required', 'email'],
            'description' => '',
        ]);

        // Check if 'tags' is provided, otherwise set a default value
        $formFields['tags'] = $request->input('tags', ''); // Use the default value of an empty string if 'tags' not provided

        if($request->hasFile('picture')){
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        // Set the 'user_id' to the authenticated user's ID
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Concert listed successfully!');

    }

    // Show Edit Form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action.');
        }
        
        $formFields = $request->validate([
            'title' => ['required',],
            'artist' => 'required',
            'location' => 'required',
            'organizer' => 'required',
            'date' => 'required',
            'time' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required',
        ]);

        // Check if 'tags' is provided, otherwise set a default value
        $formFields['tags'] = $request->input('tags', ''); // Use the default value of an empty string if 'tags' not provided

        if($request->hasFile('picture')){
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $listing->update($formFields);

        return back()->with('message', 'Concert updated successfully!');

    }

    // Delete Listing
    public function delete(Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action.');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Concert deleted successfully!');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings]);
    }

}
