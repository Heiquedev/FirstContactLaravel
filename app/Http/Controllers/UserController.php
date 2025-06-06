<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'msg' => 'Lista de usuários',
            'users' => $users,

        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required'
                ],
                [
                    'name.required' => 'O campo nome é obrigatório',
                    'email.required' => 'O campo email é obrigatório',
                    'password.required' => 'O campo password é obrigatório'
                ]
            );
            $user = User::create($request->all());
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'msg' => 'Erro ao cadastrar o usuário',
                'error' => $error->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'msg' => 'Sucesso ao cadastrar o usuário',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'success' => true,
                'msg' => "Usuário $user->name deletado com sucesso"
            ], 200);
        } catch (\Exception $error) {

            return response()->json([
                'success' => false,
                'msg' => "Erro ao deletar o usuário",
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
