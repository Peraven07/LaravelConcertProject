@extends('layouts.app')

<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Ticket Booking
            </h2>
            <p class="mb-4">Book your place</p>
        </header>

        <form action="{{ route('tickets.store') }}" method="post" enctype= "multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block font-bold text-lg mb-2">Concert Title</label>

                <select name="title" class="border border-gray-200 rounded p-2 w-full">
                    <option value="" disabled selected>Select a concert title</option>
                    <option value="James World Tour" {{ old('title') == 'James World Tour' ? 'selected' : '' }}>James
                        World Tour</option>
                    <!-- Add more options as needed -->
                </select>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="time" class="inline-block font-bold text-lg mb-2">Number of People</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="time"
                    value="{{ old('time') }}" placeholder="Example: 10" min="1" step="1" />
                @error('time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block font-bold text-lg mb-2">Total Amount</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="total_amount"
                    value="{{ old('total_amount') }}" />
                @error('total_amount')
                    <p class = "text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block font-bold text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" placeholder="Example: goliveasia@gmail.com" />
                @error('email')
                    <p class = "text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button class="bg-laravel font-bold text-white rounded py-2 px-4 hover:bg-black">Proceed to Payment
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
