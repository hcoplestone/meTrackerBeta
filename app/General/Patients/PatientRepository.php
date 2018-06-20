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
        return User::role('patient')->where('pharmacy_id', $pharmacyId)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Paginates the patients for a given pharmacy by pharmacy id
     *
     * @param $pharmacyId
     * @return mixed
     */
    public function paginatePatientsByPharmacyId($pharmacyId, $limit = 10)
    {
        return User::role('patient')->where('pharmacy_id', $pharmacyId)->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * Gets a pharmacies patient by user id
     *
     * @param $pharmacyId
     * @param $patientId
     * @return mixed
     */
    public function getPharmacyPatient($pharmacyId, $patientId)
    {
        return User::role('patient')->where('pharmacy_id', $pharmacyId)->where('id', $patientId)->firstOrFail();
    }

}