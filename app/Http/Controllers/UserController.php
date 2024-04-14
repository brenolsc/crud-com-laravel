<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * var_dump($request->except(['_token']));
         */
        $create = $this->user->create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if ($create) {
            echo 'Cadastrado!';
            return redirect()->route('users.index');
        }
        echo 'Erro!';
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('user_show',['user' => $user]);
        //var_dump(vale: $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = $this->user->find($user->id);
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get user from model and use 'where' to find the right user with the id parameter
        // use update() function that comes from '$this->user' model to set new data on database, using the return of request object that comes from paramete public function update
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }
        return redirect()->back()->with('message', 'Failed update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //var_dump('delete)
        $this->user->where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}