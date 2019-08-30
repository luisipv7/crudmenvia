@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Listagem de Usuários</h3>
            </div>
            <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('usuario.create') }}">Criar novo Usuário</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
            
        @endif

        <table class="table table-hover table-sm">
            <tr>
               <th width = "50px"><b>ID </b></th>
               <th width ="150px"><b>Nome </b></th>
                <th width ="150px"><b>Email </b></th> 
               <th>Telefone</th>
               <th > 
                   Botões de ação</th>
            </tr>


            @foreach ($users as $usuario)
                <tr>
                <td><b>{{ ++$i }}.</b></td>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->phone }}</td>
                <td style="display: flex">
                <form action="{{ route('usuario.destroy',$usuario->id) }}" method="post">
                
                <a class="btn btn-sm btn-success" width = "50%" href="{{ route('usuario.show',$usuario->id) }}">Mostrar</a>
                <a class="btn btn-sm btn-warning" width = "50%"  href="{{ route('usuario.edit',$usuario->id) }}">Editar</a> 
                @csrf
                @method('DELETE')
                <button type="submit" width = "50%" class="btn btn-sm btn-danger">DELETAR</button>
                
                </form>
                </td>
                </tr>
            @endforeach


            
        </table>


        {!! $users->links() !!}

    </div>

@endsection