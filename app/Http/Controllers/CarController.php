<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CarResource::collection(Car::get());
    }

    public function store(CarRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $car = Car::create($validated);
        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }

    public function update(CarRequest $request, $id)
    {
        if ($car = Car::findOrFail($id)) {
            $validated = $request->validated();
            $car->update($validated);
            return response()->json([
                'success' => true,
                'car_id' => $car->id
            ]);
        }
    }

    public function destroy($id)
    {
        if (Car::findOrFail($id)) {
            Car::destroy($id);
            return response()->json([
                'success' => true
            ]);
        }
    }
}
