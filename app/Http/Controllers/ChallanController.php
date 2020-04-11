<?php

namespace App\Http\Controllers;

use App\Challan;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    public function index()
    {
        return array("data" => Challan::latest()->get());
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

    public function getPrint($print_id)
    {
        $sql = "SELECT a.id, a.total_amount, b.quantity, b.price, a.model_id, c.item_name, DATE(a.created_at) as date,  SUM(b.quantity * b.price) as amt  FROM challans as a
                LEFT JOIN challan_items as b ON a.id = b.challan_id 
                LEFT JOIN items as c ON b.item_id = c.id
                WHERE a.id = $print_id
                GROUP BY c.id, b.price, b.quantity
                ORDER BY MAX(b.id) ASC";

        $record = \DB::select(\DB::raw($sql));

        $pdf = \PDF::loadView('paper.challan.challan_pdf', compact('record'));
        return $pdf->stream('challan.pdf');
    }
}