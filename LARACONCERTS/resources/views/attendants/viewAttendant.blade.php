<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase"> View Attendants
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($attendants->isEmpty())
                @foreach($attendants as $attendant)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p><strong>Concert Name:</strong> {{ $attendant->concert_name }}</p>
                        <p><strong>Full Name:</strong> {{ $attendant->full_name }}</p>
                        <p><strong>Email:</strong> {{ $attendant->email }}</p>
                        <p><strong>Contact Number:</strong> {{ $attendant->contact_no ?? 'Not provided' }}</p>
                        <p><strong>Address:</strong> {{ $attendant->address }}</p>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/attendants/{{$attendant->id}}/edit" class="text-black-400 px-6 py-2 rounded-xl"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/attendants/{{$attendant->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Attendants Found</p>
                    </td>
                </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>
