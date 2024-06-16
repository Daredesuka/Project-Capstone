<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ResponseController extends Controller
{
    public function show($id)
    {
        $data['item'] = Report::with(['Response'])->findOrFail($id);
        return view('admin.reports.edit', $data);
    }

    public function save(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();
        $response = Response::where('report_id', $id)->first();
        $report_id = $response->id;
        $responses = $response->findOrFail($report_id);
        $responses->response_date = Date::now()->format('Y-m-d');
        $responses->user_id = Auth::user()->id;
        $responses->response = $request->response;
        $responses->save();
        return redirect()->route('reports.index')->with(['success' => 'Response has been updated']);
    }
}