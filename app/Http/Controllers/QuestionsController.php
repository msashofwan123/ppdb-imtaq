<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $questions = Question::where('quiz_id', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('answer_1', 'LIKE', "%$keyword%")
                ->orWhere('answer_2', 'LIKE', "%$keyword%")
                ->orWhere('answer_3', 'LIKE', "%$keyword%")
                ->orWhere('answer_4', 'LIKE', "%$keyword%")
                ->orWhere('correct_answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $questions = Question::latest()->paginate($perPage);
        }

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $id = $request->input('quiz_id');
        $question = (object) ['correct_answer' => null];
        return view('questions.create', compact('id','question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        Question::create($requestData);
        return back()->with('flash_message', 'Question added!');

        // return redirect('questions')->with('flash_message', 'Question added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $question = Question::findOrFail($id);
        $question->update($requestData);

        return redirect('questions')->with('flash_message', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Question::destroy($id);

        return redirect('questions')->with('flash_message', 'Question deleted!');
    }
}
