<?php

namespace App\Http\Controllers\Pharmacies;

use App\General\Patients\PatientRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class PatientsController extends Controller
{

    /**
     * @var PatientRepository
     */
    private $patientRepository;

    /**
     * PatientsController constructor.
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:pharmacist');
        $this->patientRepository = $patientRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pharmacyId = auth()->user()->pharmacy->id;

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $data = $request->all();
        $patient = User::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
            'pharmacy_id' => $pharmacyId
        ]);

        $patientRole = Role::where('name', 'patient')->firstOrFail();
        $patient->assignRole($patientRole);

        Alert::success('Patient added successfully', '');
        return redirect('/pharmacist-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pharmacyId = auth()->user()->pharmacy->id;

        $patient = $this->patientRepository->getPharmacyPatient($pharmacyId, $id);
        $diaryEntries = $patient->diary_entries()->orderBy('created_at', 'desc')->paginate(10);

        return view('pharmacies.patients.show', compact('patient', 'diaryEntries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
