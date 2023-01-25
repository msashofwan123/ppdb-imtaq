<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(Request $request)
    {
        $group_id = $request->query('group_id');
        $members = DB::table('members')->where('group_id', $group_id)->get();


        // Render View with member
        return view('members.index', compact('members'));

    }

    // public function showData($id)
    // {
    //     $members = DB::table('groups')->where('group_id', $id)->get();
    //     return view('members.index', ['data' => $members]);
    // }
}
