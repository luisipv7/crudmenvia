@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3>Editar cadastro de usuário</h3>
        </div>
    </div>

    @if ($errors->any())

    <div class="alert alert-danger">
        <strong>Opa!!! </strong>alguma coisa deu errado. <br>
   
        <ul>
            @foreach ($errors as $error)

        <li>{{ $error }}</li>
                
            @endforeach
        </ul>
   
    </div>


        
    @endif

<form action="{{ route('usuario.update', $usuario->id) }}" method="post">

    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-12">
        <input type="text" placeholder="Nome" name="nome" class="form-control" value="{{ $usuario->nome }}">
        </div>

        <div class="col-md-12">
                <input type="text" placeholder="email" name="email" class="form-control" value="{{ $usuario->email }}">
            </div>
            <div class="col-md-12">
                    <input type="text" placeholder="telefone" name="phone" class="form-control" value="{{ $usuario->phone }}">
                </div>

                <div class="col-md-12">
                <a href="{{route('usuario.index')}}" class="btn btn-sm btn-success">Voltar</a>
                <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                </div>
    </div>

</form>

</div>
    
@endsection