<?php

namespace App\Http\Controllers;

use App\Http\Requests\HumanRequest;
use App\Models\Human;
use App\Services\HumanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    protected HumanService $humanService;

    /**
     * @param HumanService $humanService
     */
    public function __construct(HumanService $humanService)
    {
        $this->humanService = $humanService;
    }

    public function index(): JsonResponse
    {
        $humans = Human::all();
        return response()->json($humans);
    }

    public function show(Human $human): JsonResponse
    {
        return response()->json($human);
    }

    public function store(HumanRequest $request): JsonResponse
    {
        $human = $this->humanService->create($request->validated());
        return response()->json($human, 201);
    }

    public function update(Human $human, HumanRequest $request): JsonResponse
    {
        $human = $this->humanService->update($request->validated());
        return response()->json($human);
    }

    public function destroy(Human $human): JsonResponse
    {
        $this->humanService->delete($human);
        return response()->json(null, 204);
    }
}
