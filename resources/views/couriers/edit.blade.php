@extends('dashboard')

@section('actions')
    <x-nav-link href="{{ route('couriers.index') }}">Back</x-nav-link>
@endsection

@section('main')
    <div class="p-6 bg-white self-start max-w-lg">
        <form action="{{ route('couriers.update', $courier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-dashboard.field-text name="name" label="Name courier" value="{{ $courier->name }}" required/>
            <x-dashboard.field-number name="age" label="Age" value="{{ $courier->age }}" required/>
            <x-dashboard.field-select name="gender"
                                      label="Gender"
                                      :options="['male' => 'Male', 'female' => 'Female']"
                                      value="{{ $courier->gender }}"
                                      required
            />
            <x-dashboard.field-select name="status"
                                      label="Status"
                                      :options="['1' => 'Active', '0' => 'Inactive']"
                                      value="{{ $courier->status }}"
                                      required
            />
            <x-submit-button class="bg-orange-500 hover:bg-orange-600">Edit</x-submit-button>

        </form>
    </div>
@endsection
