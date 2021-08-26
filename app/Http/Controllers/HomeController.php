<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = User::get();
        return view('home', compact('user'));
    }

    public function cadastrar()
    {

        $user = User::get();
        return view('cadastrar', compact('user'));
    }

    public function editar($id)
    {
        $user = User::where('id', $id)->first();
        return view('editar', compact('user'));
    }

    public function remover($id)
    {
        $user = User::where('id', $id)->delete();

        return redirect('/');
    }
    public function editando(Request $request,$id)
    {
        User::where('id',$id)->update(
        ['name' => $request->input('nome'),
        'email' => $request->input('email'),
        'level' => $request->input('nivel'),
        'status' => $request->input('status'),
        'obs' => $request->input('observacao'),

    ]);

        return redirect('/');
    }
    public function cadastrando(Request $request)
    {
        $user = new User;
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('senha'));
        $user->level = $request->input('nivel');
        $user->age = $request->input('idade');
        $user->status = $request->input('status');
        $user->obs = $request->input('observacao');
        $user->save();

        return redirect('/');
    }
}
