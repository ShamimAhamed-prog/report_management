<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionModel;
use App\Models\QuestionOptionModel;

class QuestionController extends Controller
{
    public function index()
    {
        $type = CommonController::QuestionType();
        $Qstype = CommonController::QuestionSubmitType();
        $group = DB::table('question_group')->select('id', 'name')->get()->pluck('name', 'id')->prepend('Select Question Group', '0');
        // $group = CommonController::QuestionGroup();
        $position = DB::table('position')->select('id', 'name')->get()->pluck('name', 'id')->prepend('Select your position', '0');

        $item = DB::table('question')
            ->leftJoin('position', 'position.id', '=', 'question.position_id')
            ->leftJoin('question_group', 'question_group.id', '=', 'question.question_group_id')
            ->leftJoin('question_option', 'question_option.question_id', '=', 'question.id')
            ->select('question.*', 'position.name as position_name', 'question_group.name as question_group_name', 'question_option.option_title as Qoption_title')
            ->orderByDesc('question.id')
            ->get();
        return view('admin.questions.index', compact('type', 'group', 'position', 'Qstype', 'item'));
    }
    public function create()
    {
        $is_active = CommonController::isActive();
        $type = CommonController::QuestionType();
        $Qstype = CommonController::QuestionSubmitType();
        $group = DB::table('question_group')->select('id', 'name')->get()->pluck('name', 'id')->prepend('Select Question Group', '0');
        // $group = CommonController::QuestionGroup();
        $position = DB::table('position')->select('id', 'name')->get()->pluck('name', 'id')->prepend('Select your position', '0');
        return view('admin.questions.create', compact('type', 'is_active', 'group', 'position', 'Qstype'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'position_id' => 'required|integer|exists:position,id',
            'question_group_id' => 'required|integer|exists:question_group,id',
            'question_type_id' => 'required|integer|exists:question_type,id',
            'question_submit_type_id' => 'required|integer|exists:question_submit_type,id',
            'is_active' => 'required|boolean',
            'options' => 'nullable|array',
            'options.*' => 'string|max:255'
        ]);

        $question = new QuestionModel();
        $question->title = $request->title;
        $question->position_id = $request->position_id;
        $question->question_group_id = $request->question_group_id;
        $question->question_type_id = $request->question_type_id;
        $question->question_submit_type_id = $request->question_submit_type_id;
        $question->title = $request->input('title');
        $question->is_active = $request->is_active;

        // Save the question
        $question->save();
        // dd($question);
        // Check if options are provided and not empty
        if ($request->has('options') && is_array($request->options)) {
            $options = $request->input('options');
            // dd($options);
            // Check question type and perform actions accordingly
            if ($question->question_type_id == 1 || $question->question_type_id == 2) {

                $question->save();

                foreach ($options as $option) {
                    $questionOption = new QuestionOptionModel();
                    $questionOption->question_id = $question->id;
                    $questionOption->option_title = $option;
                    $questionOption->save();
                }
            }
        } else {
            $question->save();
        }

        return redirect()->back()->with('success', 'Question created successfully');
    }
}
