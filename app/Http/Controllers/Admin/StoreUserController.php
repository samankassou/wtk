<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;

class StoreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $data['remember_token'] = Str::random(10);
        $data['social_links'] = [
            'twitter'  => '',
            'facebook' => '',
            'linkedin' => ''
        ];

        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }
}
