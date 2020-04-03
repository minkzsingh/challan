<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Challan;
use App\Item;

class ChallanItem extends Model
{
    protected $fillable = ["quantity", "price", "challan_id", "item_id"];

    //Relationships
    public function challan()
    {
        return $this->belongsTo(Challan::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    //Crud
    public static function store($request, $challan)
    {
        collect($request)->map(function ($_request) use ($challan) {

            $save = [
                "challan_id" => $challan->id,
                "item_id" => $_request["item_id"],
                "price" => $_request["price"],
                "quantity" => $_request["quantity"],
            ];

            $record = self::updateOrCreate($save);

            $record->updateItem($_request);
        });
    }

    public function updateItem($request)
    {
        $item = Item::where('id', $request["item_id"])->first();
        $item->quantity = $item->quantity - $request["quantity"];
        $item->save();
    }
}