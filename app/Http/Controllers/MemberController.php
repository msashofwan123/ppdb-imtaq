<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        $members = Member::latest()->paginate(5);

        // Render View with member
        return view('members.index', compact('members'));

    }
}
