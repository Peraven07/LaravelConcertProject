@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <h1>Tickets</h1>

    @forelse($tickets as $ticket)
        <div>
            <h3>{{ $ticket->title }}</h3>
            <p>{{ $ticket->description }}</p>
        </div>
    @empty
        <p>No tickets available.</p>
    @endforelse
@endsection
