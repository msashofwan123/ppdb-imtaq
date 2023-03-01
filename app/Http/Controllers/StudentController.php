<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(20);

        //render view with students
        return view('students.index', compact('students'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
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
        $validate = $request->validate([
            'number'     => 'required',
            'name'     => 'required|min:3',
            'email'     => 'required|email',
            'password'     => 'required',
            'phone'   => 'required|min:7',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/students', $image->hashName());

        // Create User Data
        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = Hash::make($validate['password']);
        $user->save();

        //create Student
        Student::create([
            'user_id'   => $user->id,
            'number'    => $request->number,
            'phone'     => $request->phone,
            'photo'     => $image->hashName()
        ]);

        // Create Student Data
        // $student = new Student();
        // $student->user_id = $user->id;
        // $student->number = $validate['number'];
        // $student->phone = $validate['phone'];
        // $student->photo = $validate['photo'];
        // $student->save();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $student
     * @return void
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Student $student)
    {
        //validate form
        $validated = $request->validate([
            'number'    => 'required|min:10|max:10',
            'user_id'   => 'required',
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'phone'     => 'required|min:9',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update User Data
        $user = User::find($validated['user_id']);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        //check if image is uploaded
        if ($request->hasFile('photo')) {

            //upload new image
            $image = $request->file('photo');
            $image->storeAs('public/students', $image->hashName());

            //delete old image
            Storage::delete('public/students/' . $student->image);

            //update student with new image
            $student->update([
                'number'    => $request->number,
                'phone'     => $request->phone,
                'photo'     => $image->hashName()
            ]);
        } else {

            //update student without image
            $student->update([
                'number'    => $request->number,
                'phone'     => $request->phone
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy(Student $student)
    {
        //delete image
        Storage::delete('public/students/' . $student->photo);

        //delete Student
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
