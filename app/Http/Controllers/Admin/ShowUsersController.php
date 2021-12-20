<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowUsersController extends Controller
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
        $query->NotAgent();

        $query->when(request('type') == 'active', function($q){
            $q->active();
        });
        $query->when(request('type') == 'suspended', function($q){
            $q->suspended();
        });

        $users = $query->paginate(10)->withQueryString();
        $all = User::count();
        $actives = User::active()->count();
        $suspended = User::suspended()->count();

        return view('backend.admin.users.index', compact('users', 'all', 'actives', 'suspended'));
    }
}
