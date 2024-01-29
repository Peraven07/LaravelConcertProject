<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendant;

class AttendantController extends Controller
{
    /**
     * Display a listing of the attendants.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendants = Attendant::all();
        return view('attendants.create', compact('attendants'));
    }

    /**
     * Show the form for creating a new attendant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendants.create');
    }

    /**
     * Store a newly created attendant in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'concert_name' => 'required|string',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:attendants',
            'contact_no' => 'nullable|string',
            'address' => 'required|string',
        ]);

        Attendant::create($request->except(['_token']));

        return redirect()->route('attendants.index')
            ->with('success', 'Attendant created successfully.');
    }

    /**
     * Display the specified attendant.
     *
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function show(Attendant $attendant)
    {
        return view('attendants.show', compact('attendants'));
    }

//     /**
//      * Show the form for editing the specified attendant.
//      *
//      * @param  \App\Models\Attendant  $attendant
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Attendant $attendant)
//     {
//         return view('attendants.edit', compact('attendant'));
//     }

//     /**
//      * Update the specified attendant in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Attendant  $attendant
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Attendant $attendant)
//     {
//         $request->validate([
//             'concert_name' => 'required|string',
//             'full_name' => 'required|string',
//             'email' => 'required|email|unique:attendants,email,' . $attendant->id,
//             'contact_no' => 'nullable|string',
//             'address' => 'required|string',
//         ]);

//         $attendant->update($request->all());

//         return redirect()->route('attendants.index')
//             ->with('success', 'Attendant updated successfully');
//     }

//     /**
//      * Remove the specified attendant from storage.
//      *
//      * @param  \App\Models\Attendant  $attendant
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Attendant $attendant)
//     {
//         $attendant->delete();

//         return redirect()->route('attendants.index')
//             ->with('success', 'Attendant deleted successfully');
//     }
}
