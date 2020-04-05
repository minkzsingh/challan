<?php

namespace App\Http\Controllers;

use App\Challan;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    public function index()
    {
        return array("data" => Challan::all());
    }

    public function show(Challan $challan)
    {
        return $challan;
    }

    public function store(Request $request)
    {
        return Challan::store($request->all());
    }

    public function update(Request $request, Challan $challan)
    {
        return $challan->updateChallan($request->all());
    }

    public function destroy(Challan $challan)
    {
        $challan->delete();
    }

    public function datatable(Request $request)
    {
        $records = Challan::with('challanItems', 'company');

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

        return $records->paginate();
    }

    public function getLastChallanId()
    {
        return ["last_id" => Challan::orderBy('created_at', 'desc')->first()->model_id + 1];
    }
}