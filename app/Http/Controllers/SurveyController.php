<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {

        return view('surveys.index');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $survey = Survey::create($requestData);

        return response()->json([
            'id' => $survey->id,
        ]);
    }
    public function getData()
    {
        $value1 = Survey::where('value', '=', 1)->count();
        $value2 = Survey::where('value', '=', 2)->count();
        $value3 = Survey::where('value', '=', 3)->count();
        $total = Survey::count();

        return response()->json([
            'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3,
            'total' => $total,
        ]);
    }
}