<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodovayaknigaRequest;
use App\Models\Rodovayakniga;
use App\Services\RodovayaknigaService;
use Illuminate\Http\JsonResponse;

class RodovayaknigaController extends Controller
{
    protected RodovayaknigaService $rodovayaknigaService;

    /**
     * @param RodovayaknigaService $rodovayaknigaService
     */
    public function __construct(RodovayaknigaService $rodovayaknigaService)
    {
        $this->rodovayaknigaService = $rodovayaknigaService;
    }

    public function index(): JsonResponse
    {
        $rodovayakniga = Rodovayakniga::all();
        return response()->json($rodovayakniga);
    }

    public function store(RodovayaknigaRequest $request): JsonResponse
    {
        $rodovayakniga = $this->rodovayaknigaService->create($request->validated());
        return response()->json($rodovayakniga, 201);
    }

    public function update(RodovayaknigaRequest $request, Rodovayakniga $rodovayakniga): JsonResponse
    {
        $rodovayakniga = $this->rodovayaknigaService->update($rodovayakniga, $request->validated());
        return response()->json($rodovayakniga);
    }

    public function destroy(Rodovayakniga $rodovayakniga): JsonResponse
    {
        $this->rodovayaknigaService->delete($rodovayakniga);
        return response()->json(null, 204);
    }
}
