<?php

namespace App\Http\Controllers\Admin\Pharmacies;

use App\Pharmacy;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class PharmaciesPharmacistAdminController extends Controller {

    /**
     * PharmaciesPharmacistAdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $pharmacyId
     * @return \Illuminate\Http\Response
     */
    public function create($pharmacyId)
    {
        $pharmacy = Pharmacy::findOrFail($pharmacyId);

        return view('admin.pharmacies.pharmacists.create', compact('pharmacy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $pharmacyId
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($pharmacyId, Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $data = $request->all();
        $pharmacist = User::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
            'pharmacy_id' => $pharmacyId
        ]);

        $pharmacyRole = Role::where('name', 'pharmacist')->firstOrFail();
        $pharmacist->assignRole($pharmacyRole);

        Alert::success('Pharmacist added successfully', '');
        return redirect('/admin/pharmacies/' . $pharmacyId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
