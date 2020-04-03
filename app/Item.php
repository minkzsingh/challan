<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ChallanItem;

class Item extends Model
{
    protected $fillable = ["name", "quantity"];

    //Relationships
    public function challanItems()
    {
        return $this->hasMany(ChallanItem::class);
    }

    public static function store($request, $item = null)
    {
        if ($item === null)
            $item = new Item();

        $item->fill($request)->save();

        return $item;
    }

    public function updateItem($request)
    {
        return self::store($request, $this);
    }
}