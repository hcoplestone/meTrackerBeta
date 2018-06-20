<?php

namespace App\Http\Controllers;

use App\General\Patients\PatientRepository;
use App\Pharmacy;
use Illuminate\Http\Request;

class PatientDashboardController extends Controller
{

    /**
     * PatientDashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }

    public function index()
    {
        $currentUser = auth()->user();
        $pharmacy = $currentUser->pharmacy;
        $diaryEntries = $currentUser->diary_entries()->orderBy('created_at', 'desc')->paginate(10);

        return view('patients.index', compact('pharmacy', 'diaryEntries'));
    }
}
