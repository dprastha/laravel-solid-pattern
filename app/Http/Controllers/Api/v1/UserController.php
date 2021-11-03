<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return success(
            'Successful get Users',
            UserResource::collection($users),
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                return $user;
            });
            
            return success(
                'Successfuly created User',
                new UserResource($user),
            );
        } catch (\Throwable $th) {
            return error(
                'Failed to create User'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return success(
            'Successfully get user data',
            new UserResource($user)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $data = DB::transaction(function () use ($request, $user) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            });

            return success(
                'Successfully updated User',
                new UserResource($user)
            );
        } catch (\Throwable $th) {
            return error(
                'Failed to update User'
            );
        }
        

        return new UserResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return success(
                'Successfully deleted User'
            );
        } catch (\Throwable $th) {
            return error(
                'Failed to delete User'
            );
        }
        
    }
}
