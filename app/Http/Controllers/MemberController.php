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
    // public function index(Request $request)
    // {
    //     $group_id = $request->query('group_id');
    //     $members = DB::table('members')->where('group_id', $group_id)->get();


    //     // Render View with member
    //     return view('members.index', compact('members'));

    // }

    /**
     * create
     *
     * @return void
     */
    public function create($id)
    {
        // $members = DB::table('members')
        //     ->join('', 'groups.id', '=', 'members.groups_id')
        //     ->select('members.*', 'groups.name as group_name')
        //     ->get();

        $members = Member::All();
        $student = DB::table('students')
            ->select('students.id', 'students.name')
            ->get();
        
        return view('members.create', compact('members','id','student'));
        // return view('members.create', ['id' => $id, 'members' => $members]);
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $data = $request->validate([
            'group_id'     => 'required',
            'student_id'     => 'required',
        ]);

        //create post
        Member::create([
            'group_id'   => $request->group_id,
            'student_id'      => $request->student_id
        ]);

        $groupId = $data['group_id'];

        //redirect to index
        return redirect()->route('groups.show', $groupId )->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
