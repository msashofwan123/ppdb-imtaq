<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class PresenceController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get presences
        $presences = Presence::latest()->paginate(20);

        //render view with presences
        return view('presences.index', compact('presences'));
    }

    public function show($id)
{
    $schedule = Schedule::find($id);
    // $result = DB::table('schedules')
    //     ->join('groups', 'schedules.group_id', '=', 'groups.id')
    //     ->join('users', 'schedules.user_id', '=', 'users.id')
    //     ->select('schedules.*', 'groups.name as group_name', 'users.name as user_name')
    //     ->where('schedules.id', $id)
    //     ->first();

    $members = Member::where('group_id', $schedule->group_id)->get();
    return view('presences.action', compact('schedule','members'));
}

    public function store(Request $request)
    {
        $presences = Presence::All();
        $SendData = $request->input('items');
        $request->validate([
            'items' => 'required|array',
            'items.*.schedule_id' => 'required|numeric',
            'items.*.student_id' => 'required|numeric',
            'items.*.presence' => 'required',
            'items.*.note' => 'nullable',
            'subject' => 'required',
            'scheduleid' => 'required'
        ]);

        $schedule = Schedule::find($request->scheduleid);
        $schedule->note = $request->subject;
        $schedule->save();
        echo var_dump($schedule);

        foreach ($SendData as $itemdata) {

        //     // \Log::info($itemdata['schedule_id']);

            $item = new Presence();
            $item->schedule_id = $itemdata['schedule_id'];
            $item->student_id = $itemdata['student_id'];
            $item->presence = $itemdata['presence'];
            $item->note = $itemdata['note'];
            $item->saveOrFail();

        //     // echo var_dump($itemdata);
        //     // die();
        }

        return view('presences.index', compact('presences'))->with('success', 'Data berhasil disimpan.');
    }

    /**
     * edit
     * 
     * @param  mixed $presence
     * @return void
     */
    public function edit($id)
    {
        $presence = Presence::find($id);
        $schedule = Schedule::all();
        $student = Student::all();
        $selectedIds = DB::table('presences')->select('schedule_id', 'student_id')->where('id', $id)->first();
        return view('presences.edit', compact('presence', 'schedule', 'student', 'selectedIds'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $presence
     * @return void
     */
    public function update(Request $request, Presence $presence)
    {
        //validate form
        $request->validate([
            'schedule_id'     => 'required',
            'student_id'     => 'required',
            'presence'     => 'required',
            'note'     => 'nullable',
        ]);

        //update Group
        $presence->update([
            'schedule_id'   => $request->schedule_id,
            'student_id'   => $request->student_id,
            'presence'      => $request->presence,
            'note'  => $request->note
        ]);

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
