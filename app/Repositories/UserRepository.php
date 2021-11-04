<?php

namespace App\Repositories;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function getUsers()
    {
        $users = User::all();

        return success(
            'Successful get Users',
            UserResource::collection($users),
        );
    }

    public function createUser(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return success(
            'Successfuly created User',
            new UserResource($user),
        );
    }

    public function getUserById(User $user)
    {
        return success(
            'Successfully get user data',
            new UserResource($user)
        );
    }

    public function editUser(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return success(
            'Successfully updated User',
            new UserResource($user)
        );
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return success(
            'Successfully deleted User'
        );
    }
}
