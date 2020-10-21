@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="my-cifras">
        <div class="cifra-list-container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4 title-form">Minhas Cifras<i class="fas fa-guitar ml-3"></i></h2>
                    @if (sizeof($cifras) == 0)
                    <section>
                        <div>
                            <h2 class="text-center mb-5 title-form">Você não tem cifras cadastradas.</h2>
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
                            @foreach ($cifras as $cifra)
                            <tr>
                                <td><?= $cifra->nome_musica; ?></td>
                                <td><?= $cifra->nome_autor; ?></td>
                                <td><?= $cifra->estilo->nome; ?></td>
                                <td class="btn-cifra-usuario">
                                    <a class="btn btn-form " href="{{ url('cifras/' . $cifra->id) }}">Ver Cifra <i class="fas fa-play ml-2"></i></a>

                                    <a class="btn btn-form " href="{{ url('cifras/' . $cifra->id.'/edit') }}">Editar <i class="fas fa-play ml-2"></i></a>

                                    <form method="POST" action="{{ url('cifras/' . $cifra->id) }}">
                                        <input type='hidden' name='_method' value='DELETE' />
                                        {{ csrf_field() }}
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-form" type="submit" value="Entrar">Remover <i class="fas fa-plus ml-2"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <a class="btn btn-form " href="{{url('cifras')}}"><i class="fas fa-arrow-left mr-2"></i> Voltar</a>
                    </div>
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