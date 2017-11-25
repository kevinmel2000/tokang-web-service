<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{
    public function register(Request $request) {       
        $hasher = app()->make('hash');

        $email = $request->input('email');
        $name = $request->input('name');
        $password = $hasher->make($request->input('password'));

        $register = User::create([
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ]);

        if($register) {
            $res['success'] = true;
            $res['message'] = 'Success Register';

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to register';

            return response($res);
        }
        
    }

    public function edit(Request $request, $id) {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json($user);
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return response()->json('User Removed Sucessfully');
    }

    public function view($id) {
        $user = User::find($id);
        if($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user';

            return response($res);
        }
                
    }

    public function index() {
        $user = User::all();

        return response()->json($user);
    }
}