<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::guard('member')->user();
        $member = Member::where('id', $user->id)->first();
        // dd($member);

        return view('user.member', compact('member'));
    }

    public function profile($id)
    {
        $user = Auth::guard('member')->user();
        $member = Member::where('id', $id)->first();
        // dd($member);

        return view('user.profile', compact('member'));
    }
}
