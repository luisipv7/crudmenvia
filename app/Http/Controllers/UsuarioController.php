<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = Usuario::latest()->paginate(5);
       return view('usuario.index', compact('users'))
                ->with('i', (request()->input('page',1) -1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email'=> 'required',
            'phone'=> 'required'
        ]);

        Usuario::create($request->all());
        return redirect()->route('usuario.index')
                    ->with('success', 'Novo usuário criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuario.detail', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email'=> 'required',
            'phone'=> 'required'
        ]);

        $usuario = Usuario::find($id);
        $usuario->nome = $request->get('nome');
        $usuario->email = $request->get('email');
        $usuario->phone = $request->get('phone');

        $usuario->save();

        return redirect()->route('usuario.index')
                    ->with('success', 'Update efetuado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario =Usuario::find($id);
        $usuario->delete();
        return redirect()->route('usuario.index')
                        ->with('success', 'Usuario Deletado com sucesso!!!');    }
}
