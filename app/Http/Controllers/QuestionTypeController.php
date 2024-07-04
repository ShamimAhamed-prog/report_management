<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\QuestionTypeModel;
use Illuminate\Support\Facades\DB;

class QuestionTypeController extends Controller
{
    public function index()
    {
        $Qtype = DB::table('question_type')->get();
        return view('admin.question_type.index', compact('Qtype'));
    }
    public function create()
    {
        return view('admin.question_type.create');
    }

    public function store(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new position
        $Qtype = new QuestionTypeModel();
        $Qtype->name = $request->input('name');
        $Qtype->save();

        return redirect('/question/type/list')->with('status', 'Question type created successfully!');
    }

    public function edit($id)
    {
        $Qtype = QuestionTypeModel::findOrFail($id);
        return view('admin.question_type.create')->with(['item' => $Qtype]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $Qtype = QuestionTypeModel::findOrFail($id);
        $Qtype->name = $request->input('name');
        $Qtype->save();

        return redirect('/question/type/list')->with('status', 'Question type updated successfully!');
    }

    public function destroy($id)
    {
        $item = QuestionTypeModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
