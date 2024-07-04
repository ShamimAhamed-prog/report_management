<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\QuestionGroupModel;
use Illuminate\Support\Facades\DB;

class QuestionGroupController extends Controller
{
    public function index()
    {
        $Qgroup = DB::table('question_group')->get();
        return view('admin.question_group.index', compact('Qgroup'));
    }
    public function create()
    {
        return view('admin.question_group.create');
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
        $Qgroup = new QuestionGroupModel();
        $Qgroup->name = $request->input('name');
        $Qgroup->save();

        return redirect('/question/group/list')->with('status', 'Question Group created successfully!');
    }

    public function edit($id)
    {
        $Qgroup = QuestionGroupModel::findOrFail($id);
        return view('admin.question_group.create')->with(['item' => $Qgroup]);
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

        $Qgroup = QuestionGroupModel::findOrFail($id);
        $Qgroup->name = $request->input('name');
        $Qgroup->save();

        return redirect('/question/group/list')->with('status', 'Question Group updated successfully!');
    }

    public function destroy($id)
    {
        $item = QuestionGroupModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
