<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['reports'] = Report::all()->count();
        $data['unprocessed'] = Report::where('status', '0')->count();
        $data['process'] = Report::where('status', 'process')->count();
        $data['finished'] = Report::where('status', 'finished')->count();
        $data['users'] = User::all()->count();
        $data['tahun'] = DB::table("report")->select(DB::raw('EXTRACT(YEAR FROM date_report) AS Tahun, COUNT(id) as pay_total'))
            ->groupBy(DB::raw('EXTRACT(YEAR FROM date_report)'))
            ->get();
        // $data['tanggal'] = DB::table("report")->select(DB::raw('EXTRACT(DATE FROM date_report) AS Date, COUNT(id) as pay_total'))
        //     ->groupBy(DB::raw('EXTRACT(DATE FROM date_report)'))
        //     ->get();

        return view('admin.dashboards.index', $data);
    }
    public function welcome()
    {
        return view('frontend.home.index');
    }
}