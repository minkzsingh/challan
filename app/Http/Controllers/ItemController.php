<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return array('data' => Item::select('id', 'item_name', 'quantity')->get());
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function store(Request $request)
    {
        return Item::store($request->all());
    }

    public function update(Request $request, Item $item)
    {
        return $item->updateItem($request->all());
    }

    public function destroy(Item $item)
    {
        $item->delete();
    }

    public function datatable(Request $request)
    {
        $records = Item::query();

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