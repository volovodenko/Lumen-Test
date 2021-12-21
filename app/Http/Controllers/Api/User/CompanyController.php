<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Request\Api\User\AddCompanyRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\Dto\Company\AddCompanyDto;

class CompanyController
{
    public function __construct(
        private CompanyRepository $companyRepository,
    ) {
    }

    public function index()
    {
        $companies = $this->companyRepository->getByUserId(\Auth::id());

        return response()->json($companies->toArray());
    }

    public function add(AddCompanyRequest $request)
    {
        $company = $this->companyRepository->add(
            new AddCompanyDto(...$request->validated())
        );

        \Auth::user()->companies()->attach($company);

        return response()->json($company);
    }
}
