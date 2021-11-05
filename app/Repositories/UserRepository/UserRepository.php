<?php

namespace App\Repositories\UserRepository;

use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;
use App\Http\Resources\UserResource\UserResource;
use App\Interfaces\UserInterface\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function getUsers()
    {
        $users = User::with(['posts', 'comments'])->get();

        return success(
            'Successfully get Users',
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
            'Successfully created' . $request->name . ' User',
            new UserResource($user),
        );
    }

    public function getUserById(User $user)
    {
        return success(
            'Successfully get ' . $user->name . ' data',
            new UserResource($user->loadMissing(['posts', 'comments']))
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
            'Successfully updated ' . $user->name . ' data',
            new UserResource($user)
        );
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return success(
            'Successfully deleted ' . $user->name
        );
    }
}
