<?php namespace App\General\Patients;

use App\User;

class PatientRepository {

    /**
     * Gets the patients for a given pharmacy by pharmacy id
     *
     * @param $pharmacyId
     * @return mixed
     */
    public function getPatientsByPharmacyId($pharmacyId)
    {
        return User::role('patient')->where('pharmacy_id', $pharmacyId)->get();
    }

    /**
     * Paginates the patients for a given pharmacy by pharmacy id
     *
     * @param $pharmacyId
     * @return mixed
     */
    public function paginatePatientsByPharmacyId($pharmacyId, $limit = 10)
    {
        return User::role('patient')->where('pharmacy_id', $pharmacyId)->paginate($limit);
    }
    
}