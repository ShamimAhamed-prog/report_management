<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $company = DB::table('company')->get();
        return view('admin.company.index', compact('company'));
    }
    public function create()
    {
        $is_active = CommonController::isActive();
        return view('admin.company.create', compact('is_active'));
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
        $position = new CompanyModel();
        $position->name = $request->input('name');
        $position->status = $request->input('status');
        $position->save();

        return redirect('/company/list')->with('status', 'company created successfully!');
    }

    public function edit($id)
    {
        $company = CompanyModel::findOrFail($id);
        $is_active = CommonController::isActive();
        return view('admin.company.create')->with(['item' => $company, 'is_active' => $is_active]);
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

        $position = CompanyModel::findOrFail($id);
        $position->name = $request->input('name');
        $position->status = $request->input('status');
        $position->save();

        return redirect('/company/list')->with('status', 'company updated successfully!');
    }

    public function destroy($id)
    {
        $item = CompanyModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
