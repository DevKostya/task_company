<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCompanyRequest;
use App\Services\CompaniesService;

class CompaniesController extends Controller
{
    private $companyService;

    public function __construct(CompaniesService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCompanies()
    {
        $companies = $this->companyService->getCompaniesDb();
        return view('companies', compact('companies'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompanyById($id)
    {
        return $this->getCompanyById($id);
    }

    /**
     * @param AddCompanyRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCompany(AddCompanyRequest $request)
    {
        $this->companyService->postCompany($request->all());
        $companies = $this->companyService->getCompaniesDb();
        return view('companies', compact('companies'));
    }
}

