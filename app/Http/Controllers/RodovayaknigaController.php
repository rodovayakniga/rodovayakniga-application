<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodovayaknigaRequest;
use Illuminate\Http\JsonResponse;

class RodovayaknigaController extends Controller
{
    protected $rodovayaknigaService;

    /**
     * @param $rodovayaknigaService
     */
    public function __construct($rodovayaknigaService)
    {
        $this->rodovayaknigaService = $rodovayaknigaService;
    }

    public function store(RodovayaknigaRequest $request): JsonResponse
    {
        $rodovayakniga = $this->rodovayaknigaService->create($request->validated());
        return response()->json($rodovayakniga, 201);
    }

    public function update(RodovayaknigaRequest $request, int $id): JsonResponse
    {
        $rodovayakniga = $this->rodovayaknigaService->update($id, $request->validated());
        return response()->json($rodovayakniga);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->rodovayaknigaService->delete($id);
        return response()->json(null, 204);
    }
}
