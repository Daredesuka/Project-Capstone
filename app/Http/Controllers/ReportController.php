<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data['reports'] = Report::all();
        return view('admin.reports.index', $data);
    }
    public function show($id)
    {
        $data['report'] = Report::findOrFail($id);
        $data['response'] = Response::where('report_id', $id)->first();
        return view('admin.reports.show', $data);
    }
    public function destroy($id)
{
    $report = Report::find($id);
    if ($report) {
        $report->delete();
        return redirect()->back()->with('success', 'Report has been deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Report not found.');
    }
}

}