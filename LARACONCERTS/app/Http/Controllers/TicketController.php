<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.create', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'time' => 'required|numeric|min:1',
        ]);

        $ticket = Ticket::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'time' => $request->input('time'),
            'total_amount' => $request->input('time') * 50, // Assuming RM50 per person
            'email' => $request->input('email'),
        ]);

        // Rest of the payment logic if applicable...

        return redirect()->route('tickets.create')->with('success', 'Ticket created successfully.');
    }
}
