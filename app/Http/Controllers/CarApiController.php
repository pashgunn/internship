<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Repositories\Eloquent\CarApiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarApiController extends Controller
{
    public function __construct(
        private readonly CarApiRepository $carApiRepository
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return CarResource::collection($this->carApiRepository->allCars());
    }

    public function store(CarRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $car = $this->carApiRepository->create($validated);
        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }

    public function update(CarRequest $request, int $id): JsonResponse
    {
        $car = $this->carApiRepository->findCar($id);
        $validated = $request->validated();
        $car->update($validated);
        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->carApiRepository->findCar($id);
        $this->carApiRepository->deleteCar($id);
        return response()->json([
            'success' => true
        ]);
    }
}
