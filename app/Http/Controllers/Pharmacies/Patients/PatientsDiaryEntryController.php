<?php

namespace App\Http\Controllers\Pharmacies\Patients;

use App\General\Patients\PatientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientsDiaryEntryController extends Controller
{

    /**
     * @var PatientRepository
     */
    private $patientRepository;

    /**
     * PatientsDiaryEntryController constructor.
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:pharmacist');
        $this->patientRepository = $patientRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param $patientId
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($patientId, $id)
    {
        $pharmacyId = auth()->user()->pharmacy->id;
        $patient = $this->patientRepository->getPharmacyPatient($pharmacyId, $patientId);
        $diaryEntry = $patient->diary_entries()->findOrFail($id);

        return view('pharmacies.patients.diary_entries.show', compact('patient', 'diaryEntry'));
    }
}
