<?php namespace App\General\Pharmacists;

use App\User;

class PharmacistRepository {

    /**
     * Gets the pharmacists for a given pharmacy by pharmacy id
     *
     * @param $pharmacyId
     * @return mixed
     */
    public function getPharmacistsByPharmacyId($pharmacyId)
    {
        return User::role('pharmacist')->where('pharmacy_id', $pharmacyId)->get();
    }
    
}