<?php

namespace App\Http\Controllers;

use App\Models\Couriers;
use Illuminate\View\View;

class MapController extends Controller
{
    public function index(): View
    {
        $locations = Couriers::with('latestLocation')->get()->map(function ($courier) {
            $location = $courier->latestLocation;

            return [
                'name' => $courier->name,
                'lat' => (float)$location?->latitude,
                'lng' => (float)$location?->longitude,
            ];
        });

        return view('map.index', [
            'title' => 'Map Couriers',
            'locations' => $locations->toArray()
        ]);
    }
}
