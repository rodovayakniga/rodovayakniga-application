<?php
/*@TODO(Don't check data)*/
namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CrudBaseController extends Controller
{
    protected string $modelClass;

    /**
     * @param string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function index(): Response
    {
        $models = $this->modelClass::all();
        return inertia(
            "{$this->getModelName()}/Index",
            compact('models')
        );
    }

    public function show($id): Response
    {
        $model = $this->modelClass::findOrFail($id);
        return inertia(
            "{$this->getModelName()}/Show",
            compact('model')
        );
    }

    public function add(): Response
    {
        return inertia(
            "{$this->getModelName()}/Add"
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $this->modelClass::create($request->all());
        return redirect()->route("{$this->getModelName()}.index");
    }

    public function edit($id): Response
    {
        $model = $this->modelClass::findOrFail($id);
        return inertia(
            "{$this->getModelName()}/Edit",
            compact('model')
        );
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $model = $this->modelClass::findOrFail($id);
        $model->update($request->all());
        return redirect()->route("{$this->getModelName()}.index");
    }

    public function destroy($id): RedirectResponse
    {
        $model = $this->modelClass::findOrFail($id);
        $model->delete();
        return redirect()->route("{$this->getModelName()}.index");
    }

    protected function getModelName(): string
    {
        return strtolower(class_basename($this->modelClass));
    }

}
