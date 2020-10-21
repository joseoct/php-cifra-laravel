@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="form-new-cifra">
        <div class="row">
            <div class="col-md-12">
                <div class="new-cifra-container">
                    <h2 class="text-center mb-4 title-form">Editar cifra <i class="fas fa-plus ml-2"></i></h2>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form method="POST" action="{{ url('cifras/' . $cifra->id) }}">
                        <input type='hidden' name='_method' value='PUT' />
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome_musica">Nome da música:</label>
                            <input type="text" name="nome_musica" class="form-control" id="nome_musica" autocomplete="off" value="{{ $cifra->nome_musica }}">
                        </div>
                        <div class="form-group">
                            <label for="nome_autor">Nome do Artista:</label>
                            <input type="text" name="nome_autor" class="form-control" id="nome_autor" autocomplete="off" value="{{ $cifra->nome_autor }}">
                        </div>
                        <div class="form-group">
                            <label for="estilo_id">Estilo Musical:</label>
                            <select name="estilo_id" class="form-control" id="estilo_id">
                                <option value="" disabled hidden>Escolha um estilo</option>
                                @foreach($estilos as $estilo)
                                <option value="{{ $estilo->id }}" {{ ($estilo->id === $cifra->estilo_id) ? 'selected' : '' }}>{{ $estilo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="conteudo">Cifra:</label>
                            <textarea name="conteudo" class="form-control" id="conteudo" rows="20" placeholder="Digite aqui o conteúdo de sua cifra...">{{ $cifra->conteudo }}</textarea>
                        </div>
                       
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-form mt-2 md-4" type="submit" value="Entrar">Enviar Cifra <i class="fas fa-plus ml-2"></i></button>
                        </div>
                    </form>
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