<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateAgentController extends Controller
{
    public function edit(User $agent)
    {
        return view('backend.admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, User $agent)
    {

        $data = $request->validate([
            'name'     => ['required'],
            'username' => ['required', 'alpha_dash', 'unique:users,username,'.$agent->id],
            'phone'    => ['required', 'regex:/^6[5679][0-9]{7}$/'],
            'email'    => ['required', 'email'],
            'password' => ['exclude_unless:change_password,1', 'min:5', 'confirmed']
        ]);



        $data['dob']         = $request->dob ?? "";
        $data['is_featured'] = $request->is_featured ?? 0;
        if($request->change_password){
            $data['password'] = bcrypt($request->password);
        }

        $agent->update($data);

        if($request->hasFile('avatar')){
            $agent->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully');
    }

}
