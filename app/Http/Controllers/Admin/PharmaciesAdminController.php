<?php

namespace App\Http\Controllers\Admin;

use App\General\Pharmacists\PharmacistRepository;
use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PharmaciesAdminController extends Controller
{

    /**
     * @var PharmacistRepository
     */
    private $pharmacistRepository;

    /**
     * PharmaciesAdminController constructor.
     * @param PharmacistRepository $pharmacistRepository
     */
    public function __construct(PharmacistRepository $pharmacistRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->pharmacistRepository = $pharmacistRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pharmacies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:255|unique:pharmacies',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        Pharmacy::create($request->all());

        Alert::success('Pharmacy saved successfully', '');
        return redirect('/admin-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacists = $this->pharmacistRepository->getPharmacistsByPharmacyId($pharmacy->id);

        return view('admin.pharmacies.show', compact('pharmacy', 'pharmacists'));
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
