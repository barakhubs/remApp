<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateDB ()
    {
        // dd(Str::snake('Hello World No.'));
        return view('clients.upload-file');
    }

    public function listPatients ()
    {
        $patients = Patient::paginate(8);
        // $patients = Patient::whereDate('return_visit_date', Carbon::now()->subDay())->get();
        return view('clients.index', compact('patients'));
    }

    public function upComingAppointments ()
    {
        $patients = Patient::whereDate('return_visit_date', Carbon::now()->addDay())->paginate(8);
        return view('clients.upcoming', compact('patients'));
    }

    public function sendCustomSms ()
    {
        // $patients = Patient::orderBy('return_visit_date', 'desc')->get();
        return view('clients.custom-sms');
    }

    // upload single patient in
}
