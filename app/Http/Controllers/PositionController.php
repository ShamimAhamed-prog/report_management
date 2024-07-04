<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\PositionModel;

class PositionController extends Controller
{
    public function index()
    {
        $position = DB::table('position')->get();
        return view('admin.position.index', compact('position'));
    }
    public function create()
    {
        $is_active = CommonController::isActive();
        return view('admin.position.create', compact('is_active'));
    }

    public function store(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new position
        $position = new PositionModel();
        $position->name = $request->input('name');
        $position->status = $request->input('status');
        $position->save();

        return redirect('/position/list')->with('status', 'Position created successfully!');
    }

    public function edit($id)
    {
        $position = PositionModel::findOrFail($id);
        $is_active = CommonController::isActive();
        return view('admin.position.create')->with(['item' => $position, 'is_active' => $is_active]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $position = PositionModel::findOrFail($id);
        $position->name = $request->input('name');
        $position->status = $request->input('status');
        $position->save();

        return redirect('/position/list')->with('status', 'Position updated successfully!');
    }

    public function destroy($id)
    {
        $item = PositionModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
