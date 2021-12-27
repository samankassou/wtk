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
}
