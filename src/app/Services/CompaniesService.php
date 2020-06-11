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
        return Company::create($params);
    }
}
