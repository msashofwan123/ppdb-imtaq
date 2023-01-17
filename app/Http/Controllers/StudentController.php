<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
            'number'     => 'required|between:9,10',
            'name'     => 'required|min:3',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|email',
            'phone'   => 'required|numeric|between:9,18'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/students', $image->hashName());

        //create post
        Student::create([
            'number'    => $request->number,
            'name'      => $request->name,
            'photo'     => $image->hashName(),
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
