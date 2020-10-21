@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="form-login">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h2 class="text-center mb-4 title-form">Login</h2>
                    <form method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" class="form-control" name="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="password" id="senha">
                        </div>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-form mt-2 md-4" type="submit" value="Entrar">Entrar <i class="fas fa-play ml-2"></i></button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-form mt-3 md-4" href="{{ url('cadastrar') }}">Cadastrar <i class="fas fa-user-plus ml-2"></i></a>
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