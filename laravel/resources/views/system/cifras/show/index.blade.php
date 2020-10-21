@extends('layouts.site')

@push('head')
@endpush

@section('content')
<div class="bg-image">
    <div class="cifra-details">
        <div class="cifra-details-container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-2 title-form"> {{$cifra->nome_musica}} </h2>
                    <h5 class="text-center title-form">Autor: {{$cifra->nome_autor}}</h5>
                </div>
                <div class="col-md-12 mt-4 d-flex justify-content-center">
                    <textarea readonly rows="40">{{ $cifra->conteudo}}</textarea>
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