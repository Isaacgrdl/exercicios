<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;
use Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function searchByEmail(Request $request)
    {
        $users = $this->userService->searchUsersByEmail($request->all());
        if (!$users) {
            return redirect('/')->with('error', 'Preencha o campo "E-mail" para buscar');
        }
        return view('user.index', ['users' => $users]);
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit(Request $request)
    {
        $user = $this->userService->getUserById($request->id);
        if (!$user) {
            return redirect('/')->with('error', 'Usuario de ID: ' . $request->id . ' não encontrado');
        }

        return view('user.edit', ['user' => $user]);
    }

    public function store(UserRequest $request)
    {
        try {
            $user = $request->all();
            $user = $this->userService->store($user);
            return redirect('/')->with('msg', 'Usuario de ID: ' . $user . ' criado com sucesso');
        } catch (Exception $error) {
            Log::error($error);
        }
    }

    public function save(UserRequest $request)
    {
        try {
            $user = $request->all();
            $user = $this->userService->save($user);
            return redirect('/')->with('msg', 'Usuario de ID: ' . $user . ' atualizado com sucesso');
        } catch (Exception $error) {
            Log::error($error);
        }
    }

    public function delete(Request $request)
    {
        $user = $this->userService->delete($request->id);
        return redirect('/')->with('msg', 'Usuario de ID: ' . $user . ' excluido com sucesso');
    }
}
