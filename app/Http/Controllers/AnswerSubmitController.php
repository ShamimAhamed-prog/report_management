<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnswerSubmitController extends Controller
{
    public function dailySubmit(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'answers' => 'required|array',
        ]);

        $position_id = Auth::user()->position_id;
        $full_name = Auth::user()->full_name;

        try {
            DB::table('daily_answer_submit')->insert([
                'position_id' => $position_id,
                'name' => $full_name,
                'answers' => json_encode($validatedData['answers']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'Answers submitted successfully'], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to submit answer'], 500);
        }
    }
    public function weeklySubmit(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'answers' => 'required|array',
        ]);

        $position_id = Auth::user()->position_id;
        $full_name = Auth::user()->full_name;

        try {
            DB::table('weekly_answer_submit')->insert([
                'position_id' => $position_id,
                'name' => $full_name,
                'answers' => json_encode($validatedData['answers']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'Answers submitted successfully'], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to submit answer'], 500);
        }
    }
    public function monthlySubmit(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'answers' => 'required|array',
        ]);

        $position_id = Auth::user()->position_id;
        $full_name = Auth::user()->full_name;

        try {
            DB::table('monthly_answer_submit')->insert([
                'position_id' => $position_id,
                'name' => $full_name,
                'answers' => json_encode($validatedData['answers']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'Answers submitted successfully'], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to submit answer'], 500);
        }
    }
}
