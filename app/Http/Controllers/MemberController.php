<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * create
     *
     * @return void
     */
    public function create($id)
    {
        $data = Group::findOrFail($id);
        // $members = DB::table('members')
        //     ->join('', 'groups.id', '=', 'members.groups_id')
        //     ->select('members.*', 'groups.name as group_name')
        //     ->get();
        // $student = DB::table('users')
        //     ->where('role', '==', 'member')
        //     ->get();
        // $members = Member::All();
        // $student = DB::table('students')
        //     ->select('students.id', 'students.name')
        //     ->get();
        $student = Student::all();
        return view('members.create', compact('data','student'));
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

    public function destroy(Member $member)
    {

        // Delete Data
        $member->delete();

        //redirect to index
        return redirect()->route('groups.show', $member->group)->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
