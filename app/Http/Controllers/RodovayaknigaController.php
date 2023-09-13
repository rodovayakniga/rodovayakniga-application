<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodovayaknigaRequest;
use App\Models\Rodovayakniga;
use App\Services\RodovayaknigaService;
use Illuminate\Http\JsonResponse;
use Inertia\Response;

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

    public function index(): Response
    {
        $rodovayakniga = Rodovayakniga::all();
        return inertia('Rodovayakniga/Index', [
            'rodovayakniga' => $rodovayakniga,
        ]);
    }

    public function show(Rodovayakniga $rodovayakniga)
    {
        return inertia('Rodovayakniga/Show', compact('rodovayakniga'));
    }

    public function add(): Response
    {
        return inertia('Rodovayakniga/Add');
    }

    public function store(RodovayaknigaRequest $request): Response
    {
        $this->rodovayaknigaService->create($request->validated());

        return inertia('Rodovayakniga/Index', [
            'rodovayakniga' => Rodovayakniga::all(),
        ]);
    }

    public function update(RodovayaknigaRequest $request, Rodovayakniga $rodovayakniga)
    {
        $rodovayakniga = $this->rodovayaknigaService->update($rodovayakniga, $request->validated());
        return response()->json($rodovayakniga);
    }

    public function destroy(Rodovayakniga $rodovayakniga)
    {
        $rodovayakniga->delete();
        return redirect()->route('rodovayakniga');
    }
}
