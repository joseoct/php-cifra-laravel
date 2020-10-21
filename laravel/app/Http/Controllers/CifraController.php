<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CifraService;
use App\Services\EstiloService;
use Illuminate\Support\Facades\Auth;

class CifraController extends Controller
{
    public function __construct(CifraService $cifra_service, EstiloService $estilo_service)
    {
        $this->cifra_service = $cifra_service;
        $this->estilo_service = $estilo_service;
    }

    public function index()
    {
        $cifras = $this->cifra_service->model->get()->load('estilo');
        // dd($cifras->toArray());
        return view("system.cifras.index.index", compact('cifras'));
    }

    public function minhas_cifras()
    {
        $cifras = $this->cifra_service
            ->model
            ->whereHas('user', function($q){
                $q->where('user_id', Auth::id());
            })
            ->get()
            ->load('estilo');

        return view("system.cifras.list.index", compact('cifras'));
    }

    public function cadastrar()
    {
        $estilos = $this->estilo_service->model->orderBy('nome', 'asc')->get();
        return view('system.cifras.create.index', compact('estilos'));
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome_musica' => 'required',
                'nome_autor' => 'required',
                'estilo_id' => 'required',
                'conteudo' => 'required',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
            ],
            [
                'nome_musica' => 'Nome da Música',
                'nome_autor' => 'Nome do Artista',
                'estilo_id' => 'Estilo Musical',
                'conteudo' => 'Cifra',
            ]
        );

        $response = $this->cifra_service->store($request->toArray());
        if ($response === false) {
            return redirect()->back()->with('status', 'Erro ao salvar');
        }
        return redirect('cifras');
    }
    public function show($id)
    {
        $cifra = $this->cifra_service->model->findOrFail($id);
        return view('system.cifras.show.index', compact('cifra'));
    }
    public function editar($id)
    {
        $cifra = $this->cifra_service->model->findOrFail($id);
        $estilos = $this->estilo_service->model->orderBy('nome', 'asc')->get();
        return view('system.cifras.edit.index', compact('cifra', 'estilos'));
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate(
            [
                'nome_musica' => 'required',
                'nome_autor' => 'required',
                'estilo_id' => 'required',
                'conteudo' => 'required',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
            ],
            [
                'nome_musica' => 'Nome da Música',
                'nome_autor' => 'Nome do Artista',
                'estilo_id' => 'Estilo Musical',
                'conteudo' => 'Cifra',
            ]
        );

        $response = $this->cifra_service->update($request->toArray(), $id);

        if ($response === false) {
            return redirect()->back()->with('status', 'Erro ao atualizar');
        }

        return redirect('cifras');
    }

    public function remover($id)
    {
        $response = $this->cifra_service->destroy($id);

        if ($response === false) {
            return redirect()->back()->with('status', 'Erro ao remover');
        }

        return redirect('minhas-cifras');
    }
}
