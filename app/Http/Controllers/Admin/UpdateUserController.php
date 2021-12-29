<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * Display the user edit form.
     *
     * @param \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = ['admin', 'moderator'];
        return view('backend.admin.users.edit', compact('user', 'roles'));
    }

    /**
    * Update user's informations.
    *
    * @param \Illuminate\Http\Request
    * @param \App\Models\User
    * @return \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request, User $user)
    {
        $data =$request->validate([
            'name'     => ['required'],
            'username' => ['required', 'alpha_dash', 'unique:users,username,'.$user->id],
            'phone'    => ['required', 'regex:/^6[5679][0-9]{7}$/'],
            'role'     => ['required'],
            'email'    => ['required', 'email', 'unique:users,email,'.$user->id],
            'password' => ['exclude_unless:change_password,1', 'min:5', 'confirmed']
        ]);

        if($request->change_password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
}
