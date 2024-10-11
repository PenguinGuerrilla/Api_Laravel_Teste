<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    function index(): JsonResponse
    {
        $usuarios = Usuario::orderBy(column: 'id', direction: 'ASC')->get();
        return response()->json(data: [
            'status' => true,
            'usuarios' => $usuarios
        ], status: 200);
    }
    function show(Usuario $usuario): JsonResponse
    {
        return response()->json(data: [
            'status' => true,
            'usuario' => $usuario
        ], status: 200);
    }
    function store(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $usuario = Usuario::create([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'email' => $request->email
            ]);
            DB::commit();
            return response()->json(data: [
                'status' => true,
                'usuario' => $usuario,
                'mensagem' => 'Inserido com sucesso'
            ], status: 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(data: [
                'status' => false,
                'mensagem' => 'Nao foi possivel inserir'
            ], status: 400);
        }
    }
    function update(Request $request, Usuario $usuario): JsonResponse
    {
        DB::beginTransaction();
        try {
            $usuario->update([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'email' => $request->email
            ]);
            DB::commit();
            return response()->json(data: [
                'status' => true,
                'usuario' => $usuario,
                'mensagem' => 'atualizado com sucesso'
            ], status: 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(data: [
                'status' => false,
                'mensagem' => 'Nao foi possivel atualizar'
            ], status: 400);
        }
    }
    function destroy(Usuario $usuario): JsonResponse
    {
        try {
            $usuario->delete();
            return response()->json(data: [
                'status' => true,
                'usuario' => $usuario,
                'mensagem' => 'deletado com sucesso'
            ], status: 200);
        } catch (Exception $e) {
            return response()->json(data: [
                'status' => false,
                'mensagem' => 'n foi possivel deletar'
            ], status: 400);
        }
    }
}
