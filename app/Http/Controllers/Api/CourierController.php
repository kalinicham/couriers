<?php

namespace App\Http\Controllers\Api;

use App\Events\CourierLocationUpdated;
use App\Http\Controllers\Controller;
use App\Models\CourierLocation;
use App\Models\Couriers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourierController extends Controller
{
    public function updatePosition(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'errors' => $validator->errors()
            ], 400);
        }

        $courier = Couriers::findOrFail($id);

        $location = new CourierLocation([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'recorded_at' => now(),
        ]);

        try {
            $courier->locations()->save($location);
         } catch (\Throwable $th) {
            return response()->json([
                'success' => 'false',
                'errors' => $th->getMessage()
            ], 400);
        }

        event(new CourierLocationUpdated($id, $request->latitude, $request->longitude));

        return response()->json([
            'success' => 'true',
            'location' => $location
        ]);
    }

    public function list(Request $request)
    {
        $couriers = Couriers::select('id', 'name')->get()->toArray();

        return response()->json([
            'success' => 'true',
            'list' => $couriers
        ]);
    }
}
