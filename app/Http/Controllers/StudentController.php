<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $students = Student::latest()->paginate(5);

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
        $request->validate([
            'number'     => 'required|min:10|max:10',
            'name'     => 'required|min:3',
            'email'     => 'required|email',
            'phone'   => 'required|min:9',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/students', $image->hashName());

        //create Student
        Student::create([
            'number'    => $request->number,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'photo'     => $image->hashName()
        ]);

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
        $request->validate([
            'number'    => 'required|min:10|max:10',
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'phone'     => 'required|min:9',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

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
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'photo'     => $image->hashName()
            ]);
        } else {

            //update post without image
            $student->update([
                'number'    => $request->number,
                'name'      => $request->name,
                'email'     => $request->email,
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

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
