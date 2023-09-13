<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminAccountController extends Controller
{
    //mainPage
    public function mainPage(){
        $userCount = Auth::user()->select('role', DB::raw('COUNT(role) as user_count'))->where('role', 'user')->groupBy('role')->get();
        $todayDay = Carbon::now()->format('d');
        $todayMonth = Carbon::now()->format('F');
        // dd($todayMonth);
        return view('Admin.main', compact('userCount', 'todayDay', 'todayMonth'));
    }

    //accountPage
    public function accountPage($id){
        $user = Auth::user()->select('name as userName', 'email as userEmail')->where('id', $id)->first();
        return view('Admin.account.account', compact('user'));
    }
}
