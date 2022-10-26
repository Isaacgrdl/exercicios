<?php

namespace App\Services;

use App\Models\User;
use LogicException;

class UserService
{
    public function searchUsersByEmail($searchText)
    {
        if (!$searchText['email']) {
            return false;
        }
        return User::where('email', 'like', '%'.$searchText['email'].'%')->simplePaginate(10);
    }

    public function getAllUsers()
    {
        return User::simplePaginate(10);
    }

    public function getUserById(int $id)
    {
        $user = User::where('id', $id)->get();
        if (isset($user[0])) {
            return $user[0];
        }
        return false;
    }

    public function store(array $user): int
    {
        $user = User::create([
            'name' => $user['name'],
            'userName' => $user['userName'],
            'zipCode' => $user['zipCode'],
            'email' => $user['email'],
            'password' => $this->hashPassword($user['password'])
        ]);
        return $user->id;
    }

    public function save(array $data): int
    {
        $user = User::find($data['id']);
        $user->name = $data['name'];
        $user->userName = $data['userName'];
        $user->zipCode = $data['zipCode'];
        $user->email = $data['email'];
        $user->password = $this->hashPassword($data['password']);
        return $user->save();
    }

    public function delete(int $id): int
    {
        $user = User::find($id);
        return $user->delete();
    }

    private function hashPassword(string $password): String
    {
        if (!$password) {
            throw new LogicException('Senha vazia, não foi possível cryptar', 422);
        }

        $passwordMd5 = md5($password);
        return bcrypt($passwordMd5);
    }
}
