@extends('layouts.app')

@section('title', 'Attendants')

@section('content')
    <h1>Attendant Management</h1>

    @forelse($attendants as $attendants)
        <div>
            <h3>{{ $attendants->concert_name }}</h3>
            <h3>{{ $attendants->full_name }}</h3>
            <h3>{{ $attendants->email }}</h3>
            <h3>{{ $attendants->contact_no }}</h3>
            <p>{{ $attendants->address }}</p>
        </div>
    @empty
        <p>No Participants</p>
    @endforelse
@endsection
