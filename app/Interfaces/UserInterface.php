<?php

namespace App\Interfaces;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

interface UserInterface 
{
  public function getUsers();

  public function createUser(StoreUserRequest $storeUserRequest);

  public function getUserById(User $user);

  public function editUser(UpdateUserRequest $updateUserRequest, User $user);

  public function deleteUser(User $user);
  
}