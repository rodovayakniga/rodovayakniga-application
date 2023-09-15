<?php
namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class CrudBaseController extends Controller
{
    protected string $modelClass;
    protected string $requestClass;


    public function __construct(string $modelClass, string $requestClass)
    {
        $this->modelClass = $modelClass;
        $this->requestClass = $requestClass;
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

    public function store(): RedirectResponse
    {
        $request = app($this->requestClass);
        $this->modelClass::create($request->validated());
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

    public function update($id): RedirectResponse
    {
        $model = $this->modelClass::findOrFail($id);
        $request = app($this->requestClass);
        $model->update($request->validated());
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
