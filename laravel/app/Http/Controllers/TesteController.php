<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function __construct(CarService $car_service)
    {
        $this->car_service = $car_service;
    }

    public function index()
    {

        $cars = $this->car_service->model->withTrashed()->get();
        return view('system.cars.index.index', compact('cars'));
    }

    public function create()
    {

        return view('system.cars.create.index');
    }

    public function store(Request $request)
    {

        $resource = $this->car_service->store($request->toArray());

        if ($resource == false) {
            return redirect()->back()->with('status', ['danger', 'erro ao cadastrar.']);
        }
        return redirect('api/teste')->with('status', ['success', 'carro cadastrado com sucesso.']);
    }

    public function edit($id)
    {
        $car = $resource = $this->car_service->model->findOrFail($id);
        return view('system.cars.edit.index', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $resource = $this->car_service->update($request->toArray(), $id);

        if ($resource == false) {
            return redirect()->back()->with('status', ['danger', 'erro ao editar.']);
        }
        return redirect('api/teste/')->with('status', ['success', 'carro editado com sucesso.']);
    }

    public function destroy(Request $request, $id)
    {
        $resource = $this->car_service->destroy($id);

        if ($resource == false) {
            return redirect()->back()->with('status', ['danger', 'erro ao remover.']);
        }
        return redirect('api/teste/')->with('status', ['success', 'carro removido com sucesso.']);
    }

    public function restore(Request $request, $id)
    {
        $resource = $this->car_service->restore($id);

        if ($resource == false) {
            return redirect()->back()->with('status', ['danger', 'erro ao restaurar.']);
        }
        return redirect('api/teste/')->with('status', ['success', 'carro restaurado com sucesso.']);
    }
}
