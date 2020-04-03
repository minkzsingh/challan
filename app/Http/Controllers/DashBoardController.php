<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challan;
use App\Company;
use App\Item;

class DashBoardController extends Controller
{
    public function getData(Request $request)
    {
        $records = Challan::with(['challanItems', 'company']);

        if ($request->company_id)
            $records->where('company_id', $request->company_id);

        $records->get();

        return [
            "total_challan" => $records->count(),
            "total_amount" => $records->sum('total_amount'),
            "items" => Item::count(),
            "companies" => Company::count()
        ];
    }
}