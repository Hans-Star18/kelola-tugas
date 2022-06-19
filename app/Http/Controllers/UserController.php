<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('user.login', [
            'title' => 'Login',
        ]);
    }

    public function registrasi()
    {
        return view('user.register', [
            'title' => 'Register',
        ]);
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|confirmed|min:8|max:16',
            'repeat_password' => 'required|same:password|min:8|max:16',
        ];

        $validateData = $request->validate($rules);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
    }
}