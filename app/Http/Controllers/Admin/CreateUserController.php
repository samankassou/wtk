<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;

class CreateUserController extends Controller
{
    /**
     * Display the create users form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = ['admin', 'moderator'];
        return view('backend.admin.users.create', compact('roles'));
    }

    /**
    * Create a new user.
    *
    * @param \Illuminate\Http\StoreUserRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $data['remember_token'] = Str::random(10);
        $data['social_links'] = [
            'twitter' => '',
            'facebook' => '',
            'linkedin' => ''
        ];

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }
}
