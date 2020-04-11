<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Company;
use App\ChallanItem;

class Challan extends Model
{
    protected $fillable = ['total_amount', 'model_id'];
    protected $appends = ['company_name'];

    //Mutators
    public function getCompanyNameAttribute()
    {
        return $this->company->company_name;
    }

    //Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function challanItems()
    {
        return $this->hasMany(ChallanItem::class);
    }

    //Associate Relationships
    public function associateRelationships($request)
    {
        if (isset($request['items']) && !empty($request['items'])) {
            ChallanItem::store($request['items'], $this);
        }
    }

    public static function store($request, $challan = null)
    {
        if ($challan === null)
            $challan = new Challan();

        $challan->company()->associate($request['company_id']);
        $challan->fill($request)->save();
        $challan->challanItems()->createMany($request['item_arr']);
        //Associate Relationships
        //$challan->associateRelationships($request);
        ChallanItem::updateItem($request['item_arr']);

        return $challan->load('challanItems');
    }

    public function updateChallan($request)
    {
        return self::store($request, $this);
    }
}