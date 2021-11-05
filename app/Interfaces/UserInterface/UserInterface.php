<?php

namespace App\Interfaces\UserInterface;

use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;
use App\Models\User;

interface UserInterface
{
    public function getUsers();

    public function createUser(StoreUserRequest $storeUserRequest);

    public function getUserById(User $user);

    public function editUser(UpdateUserRequest $updateUserRequest, User $user);

    public function deleteUser(User $user);
}
