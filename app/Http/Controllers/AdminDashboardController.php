<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $pharmacies = Pharmacy::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.index', compact('pharmacies'));
    }
}
