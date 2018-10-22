<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Auth\Authorizable;
class AuthController extends Controller
{
//    use Authorizable;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['login']]);
        $this->middleware('auth.api',['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        $aa = auth('api')->attempt($credentials);
//        dd($aa);
//        dd(auth
//        dd(auth('api')->user());
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = auth("api")->user();
//        $role=Role::create(['name'=>'write1','guard_name'=>'api']);
//        $role=Role::findByName('write','api');
//        $permission = Permission::create(['guard_name'=>'api','name'=>'del articles']);
//        $permission = Permission::findByName('del articles','api');
//        dd($permission);
//        $role->givePermissionTo($permission);
//        $user->hasPermissionTo('发表文章','edit articles');
//        $permission = Permission::all();
//dd(Role::findByName('write','api'));
//        $user->assignRole('write');
//                ($user->getRoleNames());

//        dd($permission);
//        dd($this->authorize('del articles'));
//        dd($user->can());
//        dd($user);
//        dd($token);
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}