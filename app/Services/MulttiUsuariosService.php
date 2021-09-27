<?php

namespace App\Services;

use App\Models\MulttiUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Error;

class MulttiUsuariosService
{
    public function index()
    {
        try {
            return MulttiUsuarios::select(array(
                'id',
                'nome',
                'email',
                'telefone',
            ))
                ->orderBy('nome', 'asc')
                ->get();
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                "error" => $th,
                "message" => $th->getMessage(),
                "code" => $th->getCode()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            return MulttiUsuarios::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'senha' => Hash::make($request->senha),
                'telefone' => $request->telefone,
            ]);
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                "error" => $th,
            ]);
        }
    }

    public function show(int $id)
    {
        try {
            return MulttiUsuarios::find($id);
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                "error" => $th,
                "message" => $th->getMessage(),
                "code" => $th->getCode(),
            ]);
        }
    }

    public function update($request, int $id)
    {
        try {
            $usuario = MulttiUsuarios::find($id);

            if ($usuario) {
                $usuario->nome = $request->nome;
                $usuario->email = $request->email;
                $usuario->telefone = $request->telefone;
                $usuario->senha = Hash::make($request->senha);
                $usuario = $usuario->save();
            }
            if ($usuario) {
                return MulttiUsuarios::find($id);
            } else {
                throw new Error("usuário não encontrado", 404);
            }
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                "error" => $th,
                "message" => $th->getMessage(),
                "code" => $th->getCode()
            ]);
        }
    }

    public function delete(int $id)
    {
        try {
            return MulttiUsuarios::where('id', $id)->delete();
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                "error" => $th,
                "message" => $th->getMessage(),
                "code" => $th->getCode()
            ]);
        }
    }
}
