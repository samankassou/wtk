<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowAgentsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $query = User::query();
        $query->agent();

        $query->when(request('type') == 'active', function($q){
            $q->active();
        });
        $query->when(request('type') == 'suspended', function($q){
            $q->suspended();
        });

        $agents = $query->paginate(10)->withQueryString();
        $all = User::agent()->count();
        $actives = User::activeAgent()->count();
        $suspended = User::suspendedAgent()->count();

        return view('backend.admin.agents.index', compact('agents', 'all', 'actives', 'suspended'));
    }
}
