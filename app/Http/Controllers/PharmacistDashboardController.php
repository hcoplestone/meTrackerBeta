<?php

namespace App\Http\Controllers;

use App\General\Patients\PatientRepository;
use App\Pharmacy;
use Illuminate\Http\Request;

class PharmacistDashboardController extends Controller
{

    /**
     * @var PatientRepository
     */
    private $patientRepository;

    /**
     * PharmacistDashboardController constructor.
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:pharmacist');
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        $pharmacy = auth()->user()->pharmacy;
        $patients = $this->patientRepository->paginatePatientsByPharmacyId($pharmacy->id);

        return view('pharmacies.index', compact('pharmacy', 'patients'));
    }
}
