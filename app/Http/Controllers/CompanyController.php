<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function store(Request $request)
    {
        return Company::store($request->all());
    }

    public function update(Request $request, Company $company)
    {
        return $company->updateCompany($request->all());
    }

    public function destroy(Company $company)
    {
        $company->delete();
    }

    public function datatable(Request $request)
    {
        $records = Company::query();

        if ($request->search) {
            foreach ($request->search as $key => $value) {
                if (!is_null($value)) {
                    switch ($key) {
                        case 'search':
                            $records->where(function ($q) use ($value) {
                                $q->orWhere("id", "LIKE", "%$value%");
                            });
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        return getPaginate($records);
    }
}