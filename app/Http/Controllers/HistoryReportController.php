<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\App;

class HistoryReportController extends Controller
{
    public function day()
    {
        $data['data'] = Report::all();
        return view('admin.hreport.day.index', $data);
    }

    public function day_search()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = DB::table('report')->whereBetween('date_report', [$date1, $date2])
            ->orderBy('id', 'desc')
            ->get();

        $data['data']   =   $query;

        return view('admin.hreport.day.index', $data);
    }

    public function day_pdf()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = DB::table('report')
            ->whereBetween('date_report', [$date1, $date2])
            ->orderBy('id', 'asc')
            ->get();

        $data['data']   =   $query;
        $view = view('admin.hreport.day.print_data', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('History Report Day.pdf');
    }
}