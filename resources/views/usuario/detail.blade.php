@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Dados do Usuário: </h3>
            <hr>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nome usuário: </strong>{{ $usuario->nome }}
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email usuário: </strong>{{ $usuario->email }}
                </div>
            </div>
        </div>


        
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Telefone usuário: </strong>{{ $usuario->phone }}
                    </div>
                </div>

                <div class="col-md-12">
                <a href="{{ route('usuario.index') }}" class="btn btn-sm btn-success">Voltar</a>
                </div>
           


</div>
    
@endsection