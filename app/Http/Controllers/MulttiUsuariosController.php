<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMulttiUsuarioRequest;
use App\Http\Requests\UpdateMulttiUsuariosRequest;
use App\Http\Resources\UsuarioMulttiResource;
use App\Services\MulttiUsuariosService;

class MulttiUsuariosController extends Controller
{
    protected $multti_usuarios;

    public function __construct(MulttiUsuariosService $multti_usuarios)
    {
        $this->multti_usuarios = $multti_usuarios;
    }

    public function index()
    {
        return UsuarioMulttiResource::collection($this->multti_usuarios->index());
    }

    public function store(StoreMulttiUsuarioRequest $request)
    {
        return new UsuarioMulttiResource($this->multti_usuarios->store($request));
    }

    public function update(UpdateMulttiUsuariosRequest $request, $id)
    {
        return new UsuarioMulttiResource($this->multti_usuarios->update($request, $id));
    }

    public function show($id)
    {
        return new UsuarioMulttiResource($this->multti_usuarios->show($id));
    }

    public function destroy($id)
    {
        return new UsuarioMulttiResource($this->multti_usuarios->delete($id));
    }
}
