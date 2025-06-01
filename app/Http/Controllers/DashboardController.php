<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $search = $request->search ?? "";
        if($search != ""){

          $users = User::search($search)->get();
         
        }else{
            $users = User::all();
        }
        
        return view('dashboard', compact('users'));
    }
}
