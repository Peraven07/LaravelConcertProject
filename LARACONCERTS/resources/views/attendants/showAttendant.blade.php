@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-4">Attendant Details</h2>
            <div class="mb-4">
                <p><strong>Concert Name:</strong> {{ $attendants->concert_name }}</p>
                <p><strong>Full Name:</strong> {{ $attendants->full_name }}</p>
                <p><strong>Email:</strong> {{ $attendants->email }}</p>
                <p><strong>Contact Number:</strong> {{ $attendants->contact_no ?? 'Not provided' }}</p>
                <p><strong>Address:</strong> {{ $attendants->address }}</p>
                <p><strong>Registered At:</strong> {{ $attendants->created_at->format('M d, Y H:i:s') }}</p>
            </div>
            <a href="{{ route('attendants.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
@endsection
