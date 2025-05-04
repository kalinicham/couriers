@extends('layouts.dashboard')

@section('actions')
    <x-nav-link href="{{ route('couriers.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white">Add courier</x-nav-link>
@endsection

@section('main')
    <div class="mx-auto">
        <div class="flex bg-gray-100 font-bold text-sm p-2 border-b border-gray-300">
            <div class="w-1/6">Id</div>
            <div class="w-1/6">Name</div>
            <div class="w-1/6">Age</div>
            <div class="w-1/6">Gender</div>
            <div class="w-1/6">Status</div>
            <div class="w-1/6">Action</div>
        </div>

        @forelse ($couriers as $courier)
            <div class="flex p-4 text-sm border-b border-gray-300">
                <div class="w-1/6">{{ $courier->id }}</div>
                <div class="w-1/6">{{ $courier->name }}</div>
                <div class="w-1/6">{{ $courier->age }}</div>
                <div class="w-1/6">{{ $courier->gender }}</div>
                <div class="w-1/6 {{ $courier->status ? 'text-green-600' : 'text-red-500' }}">
                    {{ $courier->status ? 'Active' : 'Inactive' }}
                </div>
                <div class="w-1/6">
                    <a href="{{ route('couriers.edit', $courier->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    |
                    <form action="{{ route('couriers.destroy', $courier->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this courier?');"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-4 text-center text-gray-500">There are no couriers in the database.</div>
        @endforelse
    </div>
@endsection
