@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="form-login">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h2 class="text-center mb-4 title-form">Cadastrar</h2>
                    <form method="POST" action="{{url('cadastrar')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" name="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Senha:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-form mt-2 md-4" type="submit" value="Entrar">Cadastrar  <i class="fas fa-user-plus ml-2"></i></button>
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