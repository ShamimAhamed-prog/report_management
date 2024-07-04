<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->user_name == 'CTO') {
            return view('admin.dashboard', compact('user'));
        } elseif ($user->user_name == 'MD') {
            return view('admin.dashboard', compact('user'));
        } elseif ($user->user_name == 'Manager') {
            return view('admin.dashboard', compact('user'));
        }
        $item = DB::table('daily_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'daily_answer_submit.position_id')
            ->select('daily_answer_submit.*', 'position.name as position_name')
            ->get();
        // Default to a general dashboard or an error
        return view('admin.dashboard', compact('user','item'));
    }
}
