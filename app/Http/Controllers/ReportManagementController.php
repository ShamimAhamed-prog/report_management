<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportManagementController extends Controller
{
    public function dailyReport($position_id)
    {
        $question_submit_type_id = 1;
        $position_id = intval($position_id);

        $data = DB::table('question')
            ->leftJoin('question_option', 'question_option.question_id', '=', 'question.id')
            ->leftJoin('question_group', 'question_group.id', '=', 'question.question_group_id')
            ->select('question_group.name as group_name', 'question.id as question_id', 'question.question_type_id as question_type', 'question.title as question_title', 'question_option.id as question_option_id', 'question_option.option_title as question_option') // Filter by skills_id
            ->where('question.question_submit_type_id', $question_submit_type_id)
            ->where('question.position_id', $position_id)
            ->orderBy('question.id', 'ASC')
            ->get();

        $organizedData = [];

        foreach ($data as $row) {
            $questionId = $row->question_id;

            // Initialize question array if not already set
            if (!isset($organizedData['questions'][$questionId])) {
                $organizedData['questions'][$questionId] = [
                    'title' => $row->question_title,
                    'type' => $row->question_type,
                    'group_name' => $row->group_name,
                    'options' => [],
                ];
            }

            // Append options to the question
            $organizedData['questions'][$questionId]['options'][] = [
                'option_id' => $row->question_option_id,
                'option' => $row->question_option,
            ];
        }

        return view('report.daily', compact('organizedData'));
    }

    public function weeklyReport($position_id)
    {
        $question_submit_type_id = 2;
        $position_id = intval($position_id);


        $data = DB::table('question')
            ->leftJoin('question_option', 'question_option.question_id', '=', 'question.id')
            ->leftJoin('question_group', 'question_group.id', '=', 'question.question_group_id')
            ->select('question_group.name as group_name', 'question.id as question_id', 'question.question_type_id as question_type', 'question.title as question_title', 'question_option.id as question_option_id', 'question_option.option_title as question_option') // Filter by skills_id
            ->where('question.question_submit_type_id', $question_submit_type_id)
            ->where('question.position_id', $position_id)
            ->orderBy('question.id', 'ASC')
            ->get();

        $organizedData = [];

        foreach ($data as $row) {
            $questionId = $row->question_id;

            // Initialize question array if not already set
            if (!isset($organizedData['questions'][$questionId])) {
                $organizedData['questions'][$questionId] = [
                    'title' => $row->question_title,
                    'type' => $row->question_type,
                    'group_name' => $row->group_name,
                    'options' => [],
                ];
            }

            // Append options to the question
            $organizedData['questions'][$questionId]['options'][] = [
                'option_id' => $row->question_option_id,
                'option' => $row->question_option,
            ];
        }

        return view('report.weekly', compact('organizedData'));
    }
    public function monthlyReport($position_id)
    {
        $question_submit_type_id = 3;
        $position_id = intval($position_id);


        $data = DB::table('question')
            ->leftJoin('question_option', 'question_option.question_id', '=', 'question.id')
            ->leftJoin('question_group', 'question_group.id', '=', 'question.question_group_id')
            ->select('question_group.name as group_name', 'question.id as question_id', 'question.question_type_id as question_type', 'question.title as question_title', 'question_option.id as question_option_id', 'question_option.option_title as question_option') // Filter by skills_id
            ->where('question.question_submit_type_id', $question_submit_type_id)
            ->where('question.position_id', $position_id)
            ->orderBy('question.id', 'ASC')
            ->get();

        $organizedData = [];

        foreach ($data as $row) {
            $questionId = $row->question_id;

            // Initialize question array if not already set
            if (!isset($organizedData['questions'][$questionId])) {
                $organizedData['questions'][$questionId] = [
                    'title' => $row->question_title,
                    'type' => $row->question_type,
                    'group_name' => $row->group_name,
                    'options' => [],
                ];
            }

            // Append options to the question
            $organizedData['questions'][$questionId]['options'][] = [
                'option_id' => $row->question_option_id,
                'option' => $row->question_option,
            ];
        }

        return view('report.monthly', compact('organizedData'));
    }

    public function downloadDaily()
    {
        $item = DB::table('daily_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'daily_answer_submit.position_id')
            ->select('daily_answer_submit.*', 'position.name as position_name')
            ->get();
        // dd($item);
        return view('admin.download_report.daily', compact('item'));
    }

    public function generateDailyPdf($id)
    {
        // Fetch the specific record based on the ID
        $item = DB::table('daily_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'daily_answer_submit.position_id')
            ->select('daily_answer_submit.*', 'position.name as position_name')
            ->where('daily_answer_submit.id', $id)
            ->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Decode the JSON data
        $jsonData = $item->answers;
        $answers = json_decode($jsonData, true);
        $questionIds = array_keys($answers);

        // Fetch questions from the database
        $questions = QuestionModel::whereIn('id', $questionIds)->get();

        // Prepare data for the view
        $data = [];
        foreach ($questions as $question) {
            $data[] = [
                'title' => $question->title,
                'answer' => $answers[$question->id]
            ];
        }

        // Generate PDF
        $pdf = PDF::loadView('report.daily_pdf', ['data' => $data, 'item' => $item]);
        // return $pdf->stream('daily_report_' . $item->name . '_' . $item->position_name . '.pdf');
        return $pdf->download('daily_report_' . $item->name . ($item->position_name) . '.pdf');
    }

    public function downloadWeekly()
    {
        $item = DB::table('weekly_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'weekly_answer_submit.position_id')
            ->select('weekly_answer_submit.*', 'position.name as position_name')
            ->get();
        // dd($item);
        return view('admin.download_report.weekly', compact('item'));
    }

    public function generateWeeklyPdf($id)
    {
        // Fetch the specific record based on the ID
        $item = DB::table('weekly_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'weekly_answer_submit.position_id')
            ->select('weekly_answer_submit.*', 'position.name as position_name')
            ->where('weekly_answer_submit.id', $id)
            ->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Decode the JSON data
        $jsonData = $item->answers;
        $answers = json_decode($jsonData, true);
        $questionIds = array_keys($answers);

        // Fetch questions from the database
        $questions = QuestionModel::whereIn('id', $questionIds)->get();

        // Prepare data for the view
        $data = [];
        foreach ($questions as $question) {
            $data[] = [
                'title' => $question->title,
                'answer' => $answers[$question->id]
            ];
        }

        // Generate PDF
        $pdf = PDF::loadView('report.weekly_pdf', ['data' => $data, 'item' => $item]);
        // return $pdf->stream('daily_report_' . $item->name . '_' . $item->position_name . '.pdf');
        return $pdf->download('weekly_report_' . $item->name . ($item->position_name) . '.pdf');
    }
    public function downloadMonthly()
    {
        $item = DB::table('monthly_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'monthly_answer_submit.position_id')
            ->select('monthly_answer_submit.*', 'position.name as position_name')
            ->get();
        // dd($item);
        return view('admin.download_report.monthly', compact('item'));
    }

    public function generateMonthlyPdf($id)
    {
        // Fetch the specific record based on the ID
        $item = DB::table('monthly_answer_submit')
            ->leftJoin('position', 'position.id', '=', 'monthly_answer_submit.position_id')
            ->select('monthly_answer_submit.*', 'position.name as position_name')
            ->where('monthly_answer_submit.id', $id)
            ->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Decode the JSON data
        $jsonData = $item->answers;
        $answers = json_decode($jsonData, true);
        $questionIds = array_keys($answers);

        // Fetch questions from the database
        $questions = QuestionModel::whereIn('id', $questionIds)->get();

        // Prepare data for the view
        $data = [];
        foreach ($questions as $question) {
            $data[] = [
                'title' => $question->title,
                'answer' => $answers[$question->id]
            ];
        }

        // Generate PDF
        $pdf = PDF::loadView('report.monthly_pdf', ['data' => $data, 'item' => $item]);
        // return $pdf->stream('daily_report_' . $item->name . '_' . $item->position_name . '.pdf');
        return $pdf->download('monthly_report_' . $item->name . ($item->position_name) . '.pdf');
    }

    public function RevenueReport()
    {
        $item = DB::table('daily_answer_submit')
        ->leftJoin('position', 'position.id', '=', 'daily_answer_submit.position_id')
        ->select('daily_answer_submit.*', 'position.name as position_name')
        ->get();
        return view('admin.company_revenue.report',compact('item'));
    }
}
