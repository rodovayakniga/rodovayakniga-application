<?php
namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class CrudBaseController extends Controller
{
    protected string $modelClass;
    protected string $getRequestClass;


    public function __construct(string $modelClass, string $getRequestClass)
    {
        $this->modelClass = $modelClass;
        $this->getRequestClass = $getRequestClass;
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
        $request = app($this->getRequestClass);
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
        $request = app($this->getRequestClass);
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
