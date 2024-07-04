<?php

namespace App\Http\Controllers;

use App\Models\RevenueModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CompanyRevenueController extends Controller
{
    public function index()
    {
        $position_id = Auth::user()->position_id;
        $company_rev = DB::table('company_revenue')
            ->leftJoin('company', 'company.id', '=', 'company_revenue.company_id')
            ->select('company_revenue.*', 'company.name as company_name')
            ->where('company_revenue.position_id', $position_id)
            ->get();
            // dd($company_rev);
        return view('admin.company_revenue.index', compact('company_rev'));
    }
    public function create()
    {
        return view('admin.company_revenue.create');
    }

    public function store(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'monthly_target_value' => 'required',
            'achievement_value' => 'required',
            'date' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $position_id = Auth::user()->position_id;
        $company_id = Auth::user()->company_id;

        // Create a new position
        $company_rev = new RevenueModel();
        $company_rev->position_id = $position_id;
        $company_rev->company_id = $company_id;
        $company_rev->monthly_target_value = $request->input('monthly_target_value');
        $company_rev->achievement_value = $request->input('achievement_value');
        $company_rev->date = $request->input('date');
        $company_rev->save();

        return redirect('/company_revenue/list')->with('status', 'Revenue insert successfully!');
    }

    public function edit($id)
    {
        $company_rev = RevenueModel::findOrFail($id);
        return view('admin.company_revenue.create')->with(['item' => $company_rev]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'monthly_target_value' => 'required',
            'achievement_value' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $position_id = Auth::user()->position_id;
        $company_id = Auth::user()->company_id;

        $company_rev = new RevenueModel();
        $company_rev->position_id = $position_id;
        $company_rev->company_id = $company_id;
        $company_rev->monthly_target_value = $request->input('monthly_target_value');
        $company_rev->achievement_value = $request->input('achievement_value');
        $company_rev->date = $request->input('date');
        $company_rev->save();

        return redirect('/company_revenue/list')->with('status', 'Revenue updated successfully!');
    }

    public function destroy($id)
    {
        $item = RevenueModel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
