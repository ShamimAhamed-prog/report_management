<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AnswerSubmitTypeModel;
use Illuminate\Support\Facades\DB;

class AnswerSubmitTypeController extends Controller
{
    public function index()
    {
        $Astype = DB::table('question_submit_type')->get();
        return view('admin.answer_submit_type.index', compact('Astype'));
    }
    public function create()
    {
        return view('admin.answer_submit_type.create');
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
        $Astype = new AnswerSubmitTypeModel();
        $Astype->name = $request->input('name');
        $Astype->save();

        return redirect('/Answer/type/list')->with('status', 'Answer Submit Type created successfully!');
    }

    public function edit($id)
    {
        $Astype = AnswerSubmitTypeModel::findOrFail($id);
        return view('admin.answer_submit_type.create')->with(['item' => $Astype]);
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

        $Astype = AnswerSubmitTypeModel::findOrFail($id);
        $Astype->name = $request->input('name');
        $Astype->save();

        return redirect('/Answer/type/list')->with('status', 'Answer Submit Type updated successfully!');
    }

    public function destroy($id)
    {
        $item = AnswerSubmitTypeModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
