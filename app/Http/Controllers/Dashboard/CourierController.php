<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourierRequest;
use App\Models\Couriers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class CourierController extends Controller
{
    public function index(): View
    {
        $couriers = Couriers::all();
        return view('couriers.index', [
            'title' => 'Couriers',
            'actions' => true,
            'couriers' => $couriers
        ]);
    }

    public function create()
    {
        return view('couriers.create', [
            'title' => 'Add courier',
            'actions' => true,
        ]);
    }

    public function store(StoreCourierRequest $request)
    {
        $attributes = $request->validated();
        try {
            Couriers::create($attributes);
        } catch (\Throwable $th) {
            Log::error('Error creating courier:' . $th->getMessage(), [
                'trace' => $th->getTraceAsString(),
                'data' => $attributes,
            ]);

            redirect()->route('couriers.index')
                ->with('error', 'An error occurred while creating the courier. Please try again.');
        }
        return redirect()->route('couriers.index')->with('success', 'Courier added');
    }

    public function edit(Couriers $courier)
    {
        return view('couriers.edit', [
            'title' => 'Edit courier',
            'actions' => true,
            'courier' => $courier,
        ]);
    }

    public function update(StoreCourierRequest $request, Couriers $courier)
    {
        $attributes = $request->validated();

        try {
            $courier->update($attributes);
        } catch (\Throwable $th) {
        Log::error('Error creating courier:' . $th->getMessage(), [
            'trace' => $th->getTraceAsString(),
            'data' => $attributes,
        ]);

        redirect()->route('couriers.index')
        ->with('error', 'An error occurred while creating the courier. Please try again.');
        }
        return redirect()->route('couriers.index')->with('success', 'Courier update');
    }

    public function destroy(Couriers $courier)
    {
        $courier->delete();

        return redirect()->route('couriers.index')->with('success', 'Courier deleted');
    }
}
