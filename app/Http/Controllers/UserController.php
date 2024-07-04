<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
        ->leftJoin('position as reporting_position', 'reporting_position.id', '=', 'users.reporting_user')
        ->leftJoin('position as current_position', 'current_position.id', '=', 'users.position_id')
        ->select('users.*', 'reporting_position.name as reporting_username', 'current_position.name as position_name')
        ->get();
        return view('admin.user.list', compact('user'));
    }

    public function create()
    {
        $reportingUser = DB::table('position')->select('id','name')->get()->pluck('name', 'id')->prepend('Select reporting user', '0');
        $position = DB::table('position')->select('id','name')->get()->pluck('name', 'id')->prepend('Select your position', '0');
        $is_active = CommonController::isActive();
        return view('admin.user.create', compact('is_active','reportingUser','position'));
    }

    public function store(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'reporting_user' => 'required|string|max:255',
            'position_id' => 'required|string|max:255',
            'password' => 'required_with:confirm_password|min:6|same:confirm_password',
            'confirm_password' => 'min:6',
            'is_active' => 'required|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new position
        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->full_name = $request->input('full_name');
        $user->reporting_user = $request->input('reporting_user');
        $user->position_id = $request->input('position_id');
        $user->password = Hash::make($request->input('password'));
        $user->is_active = $request->input('is_active');
        $user->save();

        return redirect('/user/list')->with('status', 'Position created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $is_active = CommonController::isActive();
        $reportingUser = DB::table('position')->select('id','name')->get()->pluck('name', 'id')->prepend('Select reporting user', '0');
        $position = DB::table('position')->select('id','name')->get()->pluck('name', 'id')->prepend('Select your position', '0');
        return view('admin.user.create')->with(['item' => $user, 'is_active' => $is_active, 'reportingUser' => $reportingUser, 'position' => $position]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'reporting_user' => 'required|string|max:255',
            'position_id' => 'required|string|max:255',
            'is_active' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $user->user_name = $request->input('user_name');
        $user->full_name = $request->input('full_name');
        $user->reporting_user = $request->input('reporting_user');
        $user->position_id = $request->input('position_id');
        $user->is_active = $request->input('is_active');
        $user->save();

        return redirect('/user/list')->with('status', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

}
