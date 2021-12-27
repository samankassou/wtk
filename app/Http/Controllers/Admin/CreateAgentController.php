<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateAgentController extends Controller
{
    public function create()
    {
        return view('backend.admin.agents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'username' => ['required', 'alpha_dash', 'unique:users,username'],
            'phone'    => ['required', 'regex:/^6[5679][0-9]{7}$/'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:5', 'confirmed']
        ]);

        $data['dob'] = $request->dob ?? "";
        $data['remember_token'] = Str::random(10);
        $data['role'] = 'agent';
        $data['social_links'] = [
            'twitter' => "",
            'facebook' => "",
            'linkedin' => "",
        ];

        User::create($data);

        return redirect()->route('admin.agents.index')->with('success', 'Agent created successfully');
    }
}
