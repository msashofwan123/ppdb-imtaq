<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\UserAnswer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
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
            $useranswer = UserAnswer::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('question_id', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $useranswer = UserAnswer::latest()->paginate($perPage);
        }

        return view('user-answer.index', compact('useranswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $question = Question::where('quiz_id', $id)->get();
        $user_id = auth()->id();

        // echo var_dump($question);
        // die();
        return view('user-answer.create', compact('question', 'user_id'));
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
        $sendData = $request->input('items');
        $request->validate([
            'items' => 'required|array',
            'items.*.user_id' => 'required|numeric',
            'items.*.question_id' => 'required|numeric',
            'items.*.answer' => 'required|numeric',
        ]);

        foreach ($sendData as $itemData) {
            $item = new UserAnswer();
            $item->user_id = $itemData['user_id'];
            $item->question_id = $itemData['question_id'];
            $item->answer = $itemData['answer'];
            $item->saveOrFail();
        }

        // echo var_dump($);
        // die();
        return redirect()->route('quizzes.index')->with(['success', 'Data Berhasil Disimpan!']);
        // return view('quiz')->with('flash_message', 'UserAnswer added!');
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
        $useranswer = UserAnswer::findOrFail($id);

        return view('user-answer.show', compact('useranswer'));
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
        $useranswer = UserAnswer::findOrFail($id);

        return view('user-answer.edit', compact('useranswer'));
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

        $useranswer = UserAnswer::findOrFail($id);
        $useranswer->update($requestData);

        return redirect('user-answer')->with('flash_message', 'UserAnswer updated!');
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
        UserAnswer::destroy($id);

        return redirect('user-answer')->with('flash_message', 'UserAnswer deleted!');
    }
}
