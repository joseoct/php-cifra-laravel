@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="cifra-list">
        <div class="cifra-list-container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Auth::user()->name -->
                    <h2 class="text-center mb-4 title-form">Lista de Cifras<i class="fas fa-guitar ml-3"></i></h2>
                     @if (sizeof($cifras) == 0)
                        <section>
                            <div>
                            <h2 class="text-center mb-5 title-form">Ainda não existem cifras cadastradas.<br> Cadastre sua cifra!<i class="fas fa-arrow-down ml-3"></i></h2>
                            </div>
                        </section>
                    @else
                        <table class="table table-hover table-borderless cifras-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Música</th>
                                    <th scope="col">Artista</th>
                                    <th scope="col">Estilo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cifras as $cifra) : ?>
                                    <tr>
                                        <td><?= $cifra->nome_musica; ?></td>
                                        <td><?= $cifra->nome_autor; ?></td>
                                        <td><?= $cifra->estilo->nome; ?></td>
                                        <td class="btn-ver-cifra">
                                            <a class="btn btn-form " href="{{ url('cifras/' . $cifra->id) }}">Ver Cifra <i class="fas fa-play ml-2"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <a class="btn btn-form mt-2 md-4" href="{{url('logout')}}" class="entrar-input">Logout<i class="fas fa-sign-out-alt ml-2"></i></a>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a class="btn btn-form " href="{{url('minhas-cifras')}}">Ver minha cifras <i class="fas fa-bars ml-2"></i></a>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a class="btn btn-form " href="{{url('cifras/cadastrar')}}">Cadastrar Cifra <i class="fas fa-plus ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush