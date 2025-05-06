<?php

namespace App\Http\Controllers;

use App\Models\Couriers;
use Illuminate\View\View;

class DebugController extends Controller
{
    public function index(): View
    {
        $locations = Couriers::with('latestLocation')->get()->map(function ($courier) {
            $location = $courier->latestLocation;

            return [
                'id' => $courier->id,
                'name' => $courier->name,
                'lat' => (float)$location?->latitude,
                'lng' => (float)$location?->longitude,
            ];
        });

        return view('debug.index', [
            'title' => 'Debug page !!! Couriers',
            'locations' => $locations->toArray(),
        ]);
    }
}
