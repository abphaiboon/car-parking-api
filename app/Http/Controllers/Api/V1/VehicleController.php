<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Response;

/**
 * @group Vehicles
 */
class VehicleController extends Controller
{
    public function index(): object
    {
        return VehicleResource::collection(Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request): object
    {
        $vehicle = Vehicle::create($request->validated());

        return VehicleResource::make($vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): object
    {
        return VehicleResource::make($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVehicleRequest $request, Vehicle $vehicle): object
    {
        $vehicle->update($request->validated());
        return response()->json(VehicleResource::make($vehicle), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): object
    {
        $vehicle->delete();
        return response()->noContent();
    }
}
