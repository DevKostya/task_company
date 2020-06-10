<?php

namespace App\Services;

use App\Models\Company;

class CompaniesService
{
    /**
     * @return Company[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCompaniesDb()
    {
        return Company::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompanyById($id)
    {
        return Company::find($id);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function postCompany($params)
    {
        return Company::create([
            'name' => $params['name'],
            'inn' => $params['inn'],
            'information' => $params['information'],
            'director_name' => $params['director_name'],
            'address' => $params['address'],
            'phone_number' => $params['phone_number'],
        ]);
    }
}
