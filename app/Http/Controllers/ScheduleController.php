<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ScheduleController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $schedules = Schedule::latest()->paginate(10);
        // $join = DB::table('schedules')
        // ->join('groups', 'groups.id', '=', 'schedules.group_id')
        // ->join('users', 'users.id', '=', 'schedules.user_id')
        // ->select('schedules.*', 'groups.name as group_name', 'users.name as user_name')
        // ->get();

        //render view with posts
        return view('schedules.index', compact('schedules'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $schedules = Schedule::All();
        $group = Group::All();
        $user = User::All();
        return view('schedules.create', compact('schedules', 'group', 'user'));
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'group_id'     => 'required',
            'note'     => 'required',
            'time_start_at'     => 'required',
            'time_end_at'     => 'required',
        ]);

        // Menambahkan Data user_id ke Tabel Schedule
        $data = Group::where('id', $request->group_id)->first();

        // echo var_dump($data->user_id);

        // create Schedule
        Schedule::create([
            'group_id'   => $request->group_id,
            'user_id'   => $data->user_id,
            'note'      => $request->note,
            'time_start_at'  => $request->time_start_at,
            'time_end_at'  => $request->time_end_at
        ]);

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     * 
     * @param  mixed $schedule
     * @return void
     */
    public function edit($id)
    {
        $schedules = Schedule::find($id);
        $group = Group::All();
        // $user = User::All();
        // $selectedGroupId = DB::table('schedules')->select('group_id')->where('id', $id)->value('group_id');
        // $selectedUserId = DB::table('schedules')->select('user_id')->where('id', $id)->value('user_id');

        return view('schedules.edit', compact('schedules', 'group'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $schedules
     * @return void
     */
    public function update(Request $request, Schedule $schedule)
    {
        // die();
        //validate form
        // $request->validate([
        //     'group_id'     => 'required',
        //     'user_id'     => 'required',
        //     'note'     => 'required',
        //     'time_start_at'     => 'required',
        //     'time_end_at'     => 'required',
        // ]);
        
        $request->all();
        $data = Group::where('id',$request->group_id)->first();
        //update Group
        $schedule->update([
            'group_id'   => $request->group_id,
            'user_id'   => $data->user_id,
            'note'      => $request->note,
            'time_start_at'  => $request->time_start_at,
            'time_end_at'  => $request->time_end_at
        ]);
        // echo var_dump($schedule->user_id);
        
        // $schedule = Schedule::findOrFail($id);
        // $schedule->update($requestData);

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Schedule $schedule)
    {
        // Autentikasi Edit dan Delete Data
        if (auth()->user()->id != $schedule->user_id) {
            return redirect()->back()->withErrors(['Anda tidak memiliki hak akses untuk mengedit data ini. Silahkan Menghubungi Admin']);
        }
        // Delete Data
        $schedule->delete();

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
